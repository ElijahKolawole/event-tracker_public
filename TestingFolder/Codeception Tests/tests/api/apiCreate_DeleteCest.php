<?php 
use Codeception\Util\JsonArray;

class apiCreate_DeleteCest
{
    #============================ CREATE TEST ===========================================||

    public function createFakeEvent(ApiTester $I){
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('/event/create.php', 
            [
                'id' => '000', 
                'organization_id' => '1', 
                'org_name' => 'Test Organization',
                'title' => 'Automated Test CREATE',
                'description' => 'Added by the automated test Codeception',
                'email' => 'ggcFakeEventTest@ggc.edu',
                'phone' => '098-765-4321',
                'job_description' => null,
                'Job Start Time' => null,
                'Job End Time' => null,
                'max_position' => null,
                'min_position' => null
            ]);
        $I->canSeeResponseCodeIs(\Codeception\Util\HttpCode::CREATED);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['message' => 'event was created.']);
    }

    #============================ READ CREATED TEST ===========================================||
    public function checkToSeeCreatedExists(ApiTester $I){
        $I->sendGet('/event/read.php');
        $I->canSeeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(
            [
                'organization_id' => '1', 
                'org_name' => 'Test Organization',
                'title' => 'Automated Test CREATE',
                'description' => 'Added by the automated test Codeception',
                'email' => 'ggcFakeEventTest@ggc.edu',
                'phone' => '098-765-4321',
                'job_description' => null,
                'Job Start Time' => null,
                'Job End Time' => null,
                'max_position' => null,
                'min_position' => null
            ]);

            $id = $I->grabDataFromResponseByJsonPath('$..records[0].id[]');
            $deleteID = $id[0];
            echo "=======================".$deleteID;
            
    }

    #============================ DELETE CREATED TEST ===========================================||
    public function deleteCreatedEntry(ApiTester $I){
        $I->sendGet('/event/read.php');
        $id = $I->grabDataFromResponseByJsonPath('$..records[0].id[]');
        $deleteID = $id[0];
        echo "=========================".$deleteID;
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('/event/delete.php', 
            [
                'id' => $deleteID
            ]);
        $I->canSeeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['message' => 'Event was deleted.']);
    }


}
