<?php

use Codeception\Util\HttpCode;

class PingCest {

    public function tryToTest(ApiTester $I) {
    	$I->wantTo('check that Wordfinder is healthy');
    	$I->sendGET('/');
    	$I->seeResponseCodeIs(HttpCode::OK);
    	$I->seeResponseIsJson();
    	$I->seeResponseContains(json_encode(['status' => 'OK']));
    }
}
