<?php

use Psr\Log\NullLogger,
	Phalcon\Di,
	Phalcon\Test\UnitTestCase as PhalconTestCase;

/**
 * Base Wordfinder Test Case
 *
 * Ensure DI is setup appropriately for each test
 *
 * @author Nicholas Potesta
 * @package Wordfinder
 */
abstract class WordfinderTestCase extends PhalconTestCase {

	/**
	 * @override
	 */
	public function setUp() {
		parent::setUp();

		$di = Di::getDefault();
		$di->set('log', function () {
			return new NullLogger();
		});

		$this->setDi($di);

		Di::setDefault($di);
	}

}