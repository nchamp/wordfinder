<?php

use Codeception\Util\HttpCode;

class WordfinderCest {

	public function tryToTest(ApiTester $I) {
		$I->wantTo('perform a Wordfinder request');
		$I->sendGET('/wordfinder/dgo');
		$I->seeResponseCodeIs(HttpCode::OK);
		$I->seeResponseIsJson();
		$I->seeResponseContains(
			json_encode(["D","G","Gd","God","O","d","do","dog","g","go","god","o"])
		);
	}
}
