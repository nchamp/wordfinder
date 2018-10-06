<?php

use Codeception\Util\HttpCode;

class WordfinderCest {

	public function tryToTest(ApiTester $I) {
		$I->wantTo('perform a Wordfinder request');
		$I->sendGET('/wordfinder/dgo');
		$I->seeResponseCodeIs(HttpCode::OK);
		$I->seeResponseIsJson();
		$I->seeResponseContains(
			json_encode([
				'stubbed',
				'response',
				'for',
				'letters',
				'dgo',
			])
		);
	}
}
