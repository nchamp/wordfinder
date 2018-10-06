<?php

use Phalcon\Mvc\Micro\Collection,
	Phalcon\Mvc\Controller,
	Wordfinder\Controller\BaseController,
	Wordfinder\Routing\BaseRoutes;

/**
 * @author Nicholas Potesta
 * @package
 */
class BaseRoutesTest extends WordfinderTestCase {

	/**
	 * @var BaseRoutes
	 */
	protected $routes;

	public function setUp() {
		$this->routes = new BaseRoutes();

		return parent::setUp();
	}

	/**
	 * @covers BaseRoutes::get_prefix()
	 */
	public function test_get_prefix() {
		$this->assertEquals('/', $this->routes->get_prefix());
	}

	/**
	 * @covers BaseRoutes::get_controller()
	 */
	public function test_get_controller() {
		$this->assertInstanceOf(Controller::class,  $this->routes->get_controller());
		$this->assertEquals(new BaseController(), $this->routes->get_controller());
	}

	/**
	 * @covers BaseRoutes::routes()
	 */
	public function test_routes() {
		$mock_collection = $this->getMockBuilder(Collection::class)
			->disableOriginalConstructor()
			->getMock();

		$mock_collection->expects($this->once())
			->method('get')
			->willReturn(null);

		$this->routes->routes($mock_collection);
	}
}