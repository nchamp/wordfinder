<?php

namespace Wordfinder;

require_once(__DIR__ . '/../vendor/autoload.php');

use Monolog\Formatter\LineFormatter,
	Monolog\Handler\StreamHandler,
	Monolog\Logger,
	Phalcon\Di\FactoryDefault,
	Phalcon\Loader,
	Wordfinder\Application\Wordfinder,
	Wordfinder\Entity\Dictionary\DictionaryFileReader;

/**
 * Bootstraps our Wordfinder application
 *
 * @author Nicholas Potesta
 * @package Wordfinder
 */
class Bootstrap {

	protected $base_path;

	public function __construct(string $base_path = __DIR__) {
		$this->base_path = $base_path;
	}

	public function build_di() : FactoryDefault {
		$di = new FactoryDefault();
		$di->set(
			'url',
			function () {
				return new \Phalcon\Mvc\Url();
			}
		);

		$di->set(
			'dictionary_reader',
			function () {
				return new DictionaryFileReader();
			}
		);

		$di->set('log', function () {
			$formatter = new LineFormatter();

			$logger = new Logger('wordfinder');
			$raw_log_level = getenv('LOG_LEVEL')?: 'DEBUG'; //allow log level config via env vars

			$handler = new StreamHandler('php://stdout', Logger::toMonologLevel($raw_log_level));
			$handler->setFormatter($formatter);

			$logger->pushHandler($handler);

			return $logger;
		});

		return $di;
	}

	public function boot() {
		$loader = new Loader();
		$loader->registerFiles([
			$this->base_path . '../vendor/autoload.php', //register the composer autoloader
		]);

		$loader->register();

		$application = new Wordfinder($this->build_di());

		$application->error(function (\Exception $e) use ($application) {
			$application->log->error('Uncaught exception occurred: {exception}', [
				'exception' => $e
			]);

			$application->response->setStatusCode(500, 'Internal Error');

			$application->response->sendHeaders();

			return $application->response->setJsonContent([
				'error' => 'an internal error has occurred'
			]);
		});

		$application->notFound(function () use ($application) {
			$application->response->setStatusCode(404, 'Not Found');

			$application->response->sendHeaders();

			return $application->response->setJsonContent([
				'error' => 'path not found'
			]);
		});

		$application->handle(); //here we go!
	}
}