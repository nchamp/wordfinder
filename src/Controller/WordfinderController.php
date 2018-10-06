<?php
namespace Wordfinder\Controller;

use Phalcon\Mvc\Controller,
	Phalcon\Http\Response,
	Wordfinder\Entity\Dictionary\Dictionary,
	Wordfinder\Entity\Matcher\WordLetterMatcher;

/**
 * Wordfinder controller for any wordfinding specific functionality!
 *
 * @author Nicholas Potesta
 * @package Wordfinder
 *
 * @property \Wordfinder\Entity\Dictionary\DictionaryReaderInterface $dictionary_reader
 */
class WordfinderController extends Controller {

	/**
	 * Find any words that can be built from the given letters and return these as a JSON array in
	 * our HTTP response
	 *
	 * @param string $letters
	 * @return Response
	 */
	public function find_words(string $letters) : Response {
		$matcher = new WordLetterMatcher($letters);

		$dictionary = new Dictionary(
			$this->dictionary_reader,
			$matcher
		);

		return $this->response->setJsonContent($dictionary->find_matching_words());
	}
}