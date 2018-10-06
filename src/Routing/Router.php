<?php
namespace Wordfinder\Routing;

use Phalcon\Mvc\Micro\Collection,
	Phalcon\Mvc\Micro;

/**
 * Application router - ties the end-point paths and controllers together
 *
 * @author Nicholas Potesta
 * @package Wordfinder
 */
abstract class Router implements RoutingInterface {

	protected function build_collection() : Collection {
		$collection = new Collection();

		$collection->setHandler($this->get_controller());
		$collection->setPrefix($this->get_prefix());

		return $collection;
	}

	public function route(Micro $app) {
		$collection = $this->build_collection();

		$this->routes($collection);

		$app->mount($collection);
	}
}

