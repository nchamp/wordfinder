<?php
namespace Wordfinder\Routing;

use Phalcon\Mvc\Controller,
	Phalcon\Mvc\Micro\Collection,
	Wordfinder\Controller\BaseController;

/**
 * Base routing for any end-points located at base path: '/'
 *
 * @author Nicholas Potesta
 * @package
 */
class BaseRoutes extends Router {

	public function get_prefix() : string {
		return '/';
	}

	public function get_controller(): Controller {
		return new BaseController();
	}

	public function routes(Collection $collection) {
		$collection->get('/', 'ping');
	}
}