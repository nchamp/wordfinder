<?php
namespace Wordfinder\Entity\Matcher;

/**
 * @author Nicholas Potesta
 * @package Wordfinder
 */
class WordLetterMatcher implements MatcherInterface {

	protected $letter_count = [];

	/**
	 * WordLetterMatcher constructor.
	 *
	 * @param string $target
	 */
	public function __construct(string $target) {
		$letters_array = explode('', strtolower($target));

		$this->letter_count = array_count_values($letters_array);
	}

	/**
	 * @param string $word
	 * @return bool
	 */
	public function is_match(string $word) : boolean {
		$word_letters = explode('', strtolower($word));
		$word_letters_count = array_count_values($word_letters);

		foreach ($word_letters_count as $letter => $count) {
			$target_letter_count = $this->letter_count[$letter] ?? false;

			if (!$target_letter_count) {
				return false;
			}

			if ($target_letter_count < $count) {
				return false;
			}
		}

		return true;
	}
}