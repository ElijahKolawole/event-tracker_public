<?php 
use Codeception\Util\JsonArray;


class apiCest
{
   #============================ READ TEST ===========================================||
  
    public function doesID4Exist(ApiTester $I)
    {
        $I->sendGet('/event/read.php');
        $I->canSeeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['id' => '2']);
    }

    public function doesGGCOrgnameExist(ApiTester $I)
    {
        $I->sendGet('/event/read.php');
        $I->canSeeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['org_name' => 'Georgia Gwinnett College']);
    }

    public function isPhoneNumber911Used(ApiTester $I)
    {
        $I->sendGet('/event/read.php');
        $I->canSeeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['phone' => '911']);
    }

    public function checkForEventByEmail(ApiTester $I){
        $I->sendGet('/event/read.php');
        $I->canSeeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['email' => 'carShow@ggc.edu']);
    }

}

