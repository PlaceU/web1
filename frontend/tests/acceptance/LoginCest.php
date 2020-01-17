<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class LoginCest
{
    public function checkLogin(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->seeInTitle('Login');

        $I->seeLink('Signup');
        $I->click('Signup');
        $I->wait(2); // wait for page to be opened

        $I->see('Please fill out the following fields to signup:');
    }
}
