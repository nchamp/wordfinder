<?php
use \Wordfinder\Entity\Matcher\WordLetterMatcher;

/**
 * @author Nicholas Potesta
 * @package
 */
class WordLetterMatcherTest extends WordfinderTestCase {

	/**
	 * @covers WordLetterMatcher::is_match()
	 */
	public function test_is_match() {
		$matcher = new WordLetterMatcher('ogd');

		$should_match = [
			'do',
			'dog',
			'go',
			'god',
		];

		foreach ($should_match as $word) {
			$this->assertTrue($matcher->is_match($word));
		}

		$no_match = [
			'doq',
			'dogw',
			'goe',
			'godr',
		];
		foreach ($no_match as $word) {
			$this->assertFalse($matcher->is_match($word));
		}
	}
}