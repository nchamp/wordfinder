<?php
namespace Wordfinder\Entity\Dictionary;
use Wordfinder\Entity\Matcher\MatcherInterface;

/**
 * @author Nicholas Potesta
 * @package Wordfinder
 */
class Dictionary {

	/**
	 * @var DictionaryReaderInterface
	 */
	protected $reader;

	/**
	 * @var MatcherInterface
	 */
	protected $matcher;

	/**
	 * Dictionary constructor.
	 *
	 * @param DictionaryReaderInterface $reader
	 * @param MatcherInterface $matcher
	 */
	public function __construct(DictionaryReaderInterface $reader, MatcherInterface $matcher) {
		$this->reader = $reader;
		$this->matcher = $matcher;
	}

	/**
	 * @return array
	 */
	public function find_matching_words() : array {
		return $this->reader->get_matching_words($this->matcher);
	}

}