<?php

use Phalcon\Mvc\Micro\Collection,
	Phalcon\Mvc\Controller,
	Wordfinder\Controller\WordfinderController,
	Wordfinder\Routing\WordfinderRoutes;

/**
 * @author Nicholas Potesta
 * @package
 */
class WordfinderRoutesTest extends WordfinderTestCase {

	/**
	 * @var WordfinderRoutes
	 */
	protected $routes;

	public function setUp() {
		$this->routes = new WordfinderRoutes();

		return parent::setUp();
	}

	/**
	 * @covers WordfinderRoutes::get_prefix()
	 */
	public function test_get_prefix() {
		$this->assertEquals('/wordfinder/', $this->routes->get_prefix());
	}

	/**
	 * @covers WordfinderRoutes::get_controller()
	 */
	public function test_get_controller() {
		$this->assertInstanceOf(Controller::class,  $this->routes->get_controller());
		$this->assertEquals(new WordfinderController(), $this->routes->get_controller());
	}

	/**
	 * @covers WordfinderRoutes::routes()
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