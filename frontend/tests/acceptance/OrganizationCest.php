<?php
namespace frontend\tests\acceptance;

use common\fixtures\UserFixture;
use common\fixtures\OrganizationFixture;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class OrganizationCest
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
        ];
    }

    public function testCreateOrganization(AcceptanceTester $I, LoginCest $login)
    {
        $login->testLogin($I);
        
        $I->amOnPage(Url::toRoute('/organization'));

        $I->click('Create Organization');

        $I->wait(2);

        $I->fillField('Organization[Name]', 'Lab Center');
        $I->see('Save');
        
        $I->click('Save');


        $I->wait(2);

        $I->see('Update');
        $I->see('Delete');
    }
}
