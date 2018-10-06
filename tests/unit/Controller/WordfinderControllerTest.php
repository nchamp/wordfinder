<?php

use Wordfinder\Controller\WordfinderController,
	Wordfinder\Entity\Dictionary\DictionaryReaderInterface,
	Phalcon\Http\Response,
	Phalcon\Di;

/**
 * @author Nicholas Potesta
 * @package Wordfinder
 */
class WordfinderControllerTest extends WordfinderTestCase {
	public function test_find_words() {
		//mock the global dict reader dependency
		$mock_dictionary_reader = $this->getMockBuilder(DictionaryReaderInterface::class)
			->disableOriginalConstructor()
			->getMock();

		$mock_dictionary_reader->expects($this->once())
			->method('get_matching_words')
			->willReturn([
				'foo',
				'bar',
				'biz',
				'bang',
			]);

		$di = Di::getDefault();
		$di->set('dictionary_reader', function () use ($mock_dictionary_reader) {
			return $mock_dictionary_reader;
		});

		$this->setDi($di);

		Di::setDefault($di);

		$mock_response = $this->getMockBuilder(\Phalcon\Http\Response::class)
			->disableOriginalConstructor()
			->getMock();

		$test_input = 'foobarbizbang';

		$expected_response = new Response();
		$expected_response->setJsonContent([
			'foo',
			'bar',
			'biz',
			'bang',
		]);

		$mock_response->expects($this->once())
			->method('setJsonContent')
			->willReturn($expected_response);

		$controller = new WordfinderController();
		$controller->response = $mock_response;

		$this->assertEquals($expected_response, $controller->find_words($test_input));
	}

}