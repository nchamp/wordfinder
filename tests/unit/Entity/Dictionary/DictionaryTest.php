<?php

use Wordfinder\Entity\Dictionary\Dictionary;
use Wordfinder\Entity\Dictionary\DictionaryReaderInterface,
	Wordfinder\Entity\Matcher\MatcherInterface;

/**
 * @author Nicholas Potesta
 * @package
 */
class DictionaryTest extends WordfinderTestCase {

	/**
	 * @covers Dictionary::find_matching_words()
	 */
	public function test_find_matching_words() {
		$expected_matches = [
			'foo',
			'bar',
		];

		$mock_reader = $this->getMockBuilder(DictionaryReaderInterface::class)
			->disableOriginalConstructor()
			->getMock();

		$mock_reader->expects($this->once())
			->method('get_matching_words')
			->willReturn($expected_matches);

		$mocker_matcher = $this->getMockBuilder(MatcherInterface::class)
			->disableOriginalConstructor()
			->getMock();

		$dictionary = new Dictionary($mock_reader, $mocker_matcher);

		$this->assertEquals($expected_matches, $dictionary->find_matching_words());
	}
}