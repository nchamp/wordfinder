<?php
/**
 * @author Nicholas Potesta
 * @package
 */
class DictionaryFileReaderTest extends WordfinderTestCase {

	/**
	 * @covers \Wordfinder\Entity\Dictionary\DictionaryFileReader::get_matching_words()
	 * @covers \Wordfinder\Exception\DictionaryNotFoundException
	 *
	 * @expectedException \Wordfinder\Exception\DictionaryNotFoundException
	 */
	public function test_get_matching_words_dictionary_not_found_exception() {
		$mock_matcher = $this->getMockBuilder(\Wordfinder\Entity\Matcher\MatcherInterface::class)
			->disableOriginalConstructor()
			->getMock();

		$dictionary_reader = new \Wordfinder\Entity\Dictionary\DictionaryFileReader('/some/incorrect/location');

		$dictionary_reader->get_matching_words($mock_matcher); //should throw exception!
	}
}