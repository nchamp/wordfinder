<?php
namespace Wordfinder\Entity\Dictionary;

use Wordfinder\Entity\Matcher\MatcherInterface,
	Wordfinder\Exception\DictionaryNotFoundException;

/**
 * @author Nicholas Potesta
 * @package Wordfinder
 */
class DictionaryFileReader implements DictionaryReaderInterface {

	const DEFAULT_DICT_LOCATION = "/usr/share/dict/words";

	/**
	 * @var string
	 */
	protected $dictionary_location;

	/**
	 * DictionaryFileReader constructor.
	 *
	 * @param string $dictionary_location
	 */
	public function __construct(string $dictionary_location = self::DEFAULT_DICT_LOCATION) {
		$this->dictionary_location = $dictionary_location;
	}

	/**
	 * @param MatcherInterface $matcher
	 * @return array
	 * @throws DictionaryNotFoundException
	 */
	public function get_matching_words(MatcherInterface $matcher) : array {
		if (!file_exists($this->dictionary_location)) {
			throw new DictionaryNotFoundException("Unable to locate dictionary: " .  $this->dictionary_location);
		}

		$handle = fopen($this->dictionary_location, 'r');
		if (!$handle) {
			throw new DictionaryNotFoundException("Unable to read dictionary located at: " .  $this->dictionary_location);
		}

		$matches = [];
		while (($word = fgets($handle)) !== false) {
			$word = rtrim($word);

			if ($matcher->is_match($word)) {
				$matches[] = $word;
			}
		}

		fclose($handle);

		return $matches;
	}

}