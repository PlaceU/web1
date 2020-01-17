<?php
namespace frontend\tests\acceptance;

use common\fixtures\UserFixture;
use common\fixtures\RoomFixture;
use common\fixtures\OrganizationFixture;
use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class RoomCest
{
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php',
            ],
            'organization' => [
                'class' => OrganizationFixture::className(),
            ],
            'room' => [
                'class' => RoomFixture::className(),
            ],
        ];
    }

    public function testCreateRoom(AcceptanceTester $I, OrganizationCest $org, LoginCest $login)
    {
        $org->testCreateOrganization($I, $login);
        
        $I->amOnPage(Url::toRoute('/room'));

        $I->click('Create Room');
        $I->wait(1);

        $I->fillField('Room[OrganizationID]', 1);
        $I->fillField('Room[Name]', "Sala 4");
        $I->fillField('Room[Chairs]', 20);
        
        $I->click('Save');


        $I->wait(1);

        $I->see('Update');
        $I->see('Delete');
    }
}
