<?php
namespace Wordfinder\Routing;

use Phalcon\Mvc\Controller,
	Phalcon\Mvc\Micro\Collection,
	Wordfinder\Controller\WordfinderController;

/**
 * Routing class for end-points located at base path: '/wordfinder/'
 *
 * @author Nicholas Potesta
 * @package
 */
class WordfinderRoutes extends Router {

	public function get_prefix(): string {
		return '/wordfinder/';
	}

	public function get_controller(): Controller {
		return new WordfinderController();
	}

	public function routes(Collection $collection) {
		$collection->get('{input:[a-zA-Z]+}', 'find_words');
	}
}