<?php

use Wordfinder\Controller\BaseController,
	Phalcon\Http\Response;

/**
 * @author Nicholas Potesta
 * @package Wordfinder
 */
class BaseControllerTest extends WordfinderTestCase {
	public function test_ping() {
		$mock_response = $this->getMockBuilder(\Phalcon\Http\Response::class)
			->disableOriginalConstructor()
			->getMock();

		$expected_response = new Response();
		$expected_response->setJsonContent(['status' => 'OK']);

		$mock_response->expects($this->once())
			->method('setJsonContent')
			->willReturn($expected_response);

		$controller = new BaseController();
		$controller->response = $mock_response;

		$this->assertEquals($expected_response, $controller->ping());
	}

}