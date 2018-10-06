<?php

use Wordfinder\Controller\WordfinderController,
	Phalcon\Http\Response;

/**
 * @author Nicholas Potesta
 * @package Wordfinder
 */
class WordfinderControllerTest extends WordfinderTestCase {
	public function test_find_words() {
		$mock_response = $this->getMockBuilder(\Phalcon\Http\Response::class)
			->disableOriginalConstructor()
			->getMock();

		$test_input = 'qwerty';

		$expected_response = new Response();
		$expected_response->setJsonContent(['stubbed', 'response', 'for', 'letters', $test_input]);

		$mock_response->expects($this->once())
			->method('setJsonContent')
			->willReturn($expected_response);

		$controller = new WordfinderController();
		$controller->response = $mock_response;

		$this->assertEquals($expected_response, $controller->find_words($test_input));
	}

}