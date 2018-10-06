<?php
namespace Wordfinder\Entity\Matcher;

/**
 * @author Nicholas Potesta
 * @package Wordfinder
 */
class WordLetterMatcher implements MatcherInterface {

	protected $target_letter_count = [];

	/**
	 * WordLetterMatcher constructor.
	 *
	 * @param string $target
	 */
	public function __construct(string $target) {
		$target_letters_array = str_split(strtolower($target));

		$this->target_letter_count = array_count_values($target_letters_array);
	}

	/**
	 * @param string $word
	 * @return bool
	 */
	public function is_match(string $word) : bool {
		$word_letters = str_split(strtolower($word));
		$word_letters_count = array_count_values($word_letters);

		foreach ($word_letters_count as $letter => $count) {
			$target_letter_count = $this->target_letter_count[$letter] ?? false;

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