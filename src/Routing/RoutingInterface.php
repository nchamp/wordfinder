<?php
namespace Wordfinder\Routing;

use Phalcon\Mvc\Controller,
	Phalcon\Mvc\Micro\Collection,
	Phalcon\Mvc\Micro;

/**
 * Standard interface for all Wordfinder routers
 *
 * @author Nicholas Potesta
 * @package
 */
interface RoutingInterface {
	public function get_prefix() : string;
	public function get_controller() : Controller;
	public function route(Micro $app);
	public function routes(Collection $collection);
}