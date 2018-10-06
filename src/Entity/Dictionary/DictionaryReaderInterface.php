<?php

namespace Wordfinder\Entity\Dictionary;

use Wordfinder\Entity\Matcher\MatcherInterface;

/**
 * @author Nicholas Potesta
 * @package
 */
interface DictionaryReaderInterface {
	public function get_matching_words(MatcherInterface $matcher) : array;
}