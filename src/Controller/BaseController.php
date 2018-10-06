<?php
namespace Wordfinder\Controller;

use Phalcon\Mvc\Controller,
	Phalcon\Http\Response;

/**
 * Base path controller '/'
 *
 * @author Nicholas Potesta
 * @package Wordfinder
 *
 * @property \Monolog\Logger $log
 */
class BaseController extends Controller {

	/**
	 * Ping / health check end-point. Making sure everything is okay!
	 *
	 * @return Response
	 */
	public function ping() : Response {
		$this->log->debug("Incoming ping request!");

		return $this->response->setJsonContent([
			'status' => 'OK'
		]);
	}
}