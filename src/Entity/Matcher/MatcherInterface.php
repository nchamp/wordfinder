<?php

namespace Wordfinder\Entity\Matcher;

/**
 * @author Nicholas Potesta
 * @package
 */
interface MatcherInterface {
	public function __construct(string $target);
	public function is_match(string $word) : bool;
}