<?php

namespace Wordfinder;

/**
 * Wordfinder AutoLoader
 *
 * @author Nicholas Potesta
 * @package Wordfinder
 */
class Autoloader {

	const NS_SEP = "\\";

	private $directory;
	private $prefix;
	private $prefix_length;

	/**
	 * Autoloader constructor.
	 *
	 * @param string $base_directory
	 */
	public function __construct($base_directory = __DIR__) {
		$this->directory = $base_directory;
		$this->prefix = __NAMESPACE__ . static::NS_SEP;
		$this->prefix_length = strlen($this->prefix);
	}

	/**
	 * Wrapper function to register the autoloader
	 *
	 * @param $base_dir
	 * @param bool $throw_errors
	 * @param bool $prepend
	 */
	public static function register($base_dir = __DIR__, $throw_errors = true, $prepend = false) {
		spl_autoload_register(array(new static($base_dir), 'autoload'), $throw_errors, $prepend);
	}

	/**
	 * The functionality that does all the heavy lifting!
	 *
	 * @param $class_name
	 */
	public function autoload($class_name) {
		if (strpos($class_name, $this->prefix) !== 0) {
			return;
		}

		$parts = explode(static::NS_SEP, substr($class_name, $this->prefix_length));
		$file_path = $this->directory . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $parts) . '.php';

		if (is_file($file_path)) {
			require($file_path);
		}
	}
}