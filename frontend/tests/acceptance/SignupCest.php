<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class SignupCest
{
    public function testSignup(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/signup'));
        $I->seeInTitle('Signup');

        $I->submitForm('#form-signup', array(
            'SignupForm[username]' => 'davert',
            'SignupForm[email]' => 'qwerty@gmail.com',
            'SignupForm[password]' => 'qwerty'
        ));

        $I->wait(2);
        $I->dontSee('Username cannot be blank.');
        $I->dontSee('Email cannot be blank');
        $I->dontSee('Password cannot be blank.');

        $I->see('Create Organization');
    }
}
