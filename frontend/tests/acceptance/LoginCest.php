<?php
namespace frontend\tests\acceptance;

use common\fixtures\UserFixture;
use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php',
            ],
        ];
    }

    public function checkLoginPage(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->seeInTitle('Login');

        $I->seeLink('Signup');
        $I->click('Signup');
        $I->wait(2); // wait for page to be opened

        $I->see('Please fill out the following fields to signup:');
    }

    public function testLogin(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->seeInTitle('Login');

        $I->submitForm('#login-form', array(
            'LoginForm[username]' => 'erau',
            'LoginForm[password]' => 'password_0'
        ));

        $I->wait(1);

        $I->see('Organization');
    }
}
