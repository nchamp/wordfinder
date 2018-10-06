<?php
namespace Wordfinder\Application;

use Phalcon\DiInterface;
use Phalcon\Mvc\Micro,
	Wordfinder\Routing\BaseRoutes,
	Wordfinder\Routing\WordfinderRoutes;

/**
 * Base Wordfinder Application Class
 *
 * Handles automagic building of the routes/handlers for the controller and URL paths
 *
 * @author Nicholas Potesta
 * @package Wordfinder
 */
class Wordfinder extends Micro {
	const ROUTERS = [
		BaseRoutes::class,
		WordfinderRoutes::class,
	];

	public function __construct(DiInterface $dependency_injector = null) {
		parent::__construct($dependency_injector);

		$this->build_routing();
	}

	public function build_routing() {
		foreach (static::ROUTERS as $router_class) {
			$router = new $router_class();
			$router->route($this);
		}
	}
}