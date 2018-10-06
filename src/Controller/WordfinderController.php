<?php
namespace Wordfinder\Controller;

use Phalcon\Mvc\Controller,
	Phalcon\Http\Response;

/**
 * Wordfinder controller for any wordfinding specific functionality!
 *
 * @author Nicholas Potesta
 * @package Wordfinder
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
		//TODO: Implement logic...

		return $this->response->setJsonContent(['stubbed', 'response', 'for', 'letters', $letters]);
	}
}