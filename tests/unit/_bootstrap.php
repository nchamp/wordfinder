<?php

use Phalcon\Di,
	Phalcon\Loader;

/**
 * Unit Test bootstrap
 *
 * Just setup DI - no need for routing and the like...
 *
 * @author Nicholas Potesta <potestani@luxbet.com>
 * @package Wordfinder
 */
require_once(__DIR__ . "/../../src/bootstrap.php");
require_once("UnitTestCase.php");

$bootstrap = new \Wordfinder\Bootstrap();

$loader = new Loader();

$loader->registerFiles([
	__DIR__ . '/../../vendor/autoload.php', //register composer autoloader
]);

$loader->register();

Di::reset();

Di::setDefault($bootstrap->build_di());