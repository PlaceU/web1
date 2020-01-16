<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class SignupCest
{
    protected $formId = '#form-signup';


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/signup');
    }

    public function signupWithEmptyFields(FunctionalTester $I)
    {
        $I->see('Signup', 'h1');
        $I->see('Please fill out the following fields to signup:');
        $I->submitForm($this->formId, []);
        $I->seeValidationError('Username cannot be blank.');
        $I->seeValidationError('Email cannot be blank.');
        $I->seeValidationError('Password cannot be blank.');

    }

    public function signupWithWrongEmail(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
            'SignupForm[username]'  => 'tester',
            'SignupForm[email]'     => 'ttttt',
            'SignupForm[password]'  => 'tester_password',
        ]
        );
        $I->dontSee('Username cannot be blank.', '.help-block');
        $I->dontSee('Password cannot be blank.', '.help-block');
        $I->see('Email is not a valid email address.', '.help-block');
    }

    public function signupWithInvalidPassword(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
                'SignupForm[username]'  => 'tester',
                'SignupForm[email]'     => 'ttttt@mail.com',
                'SignupForm[password]'  => 'tes',
            ]
        );
        $I->dontSee('Username cannot be blank.', '.help-block');
        $I->See('Password should contain at least 6 characters.', '.help-block');
        $I->dontSee('Email cannot be blank.', '.help-block');
    }

    public function signupWithInvalidUsername(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
                'SignupForm[username]'  => 't',
                'SignupForm[email]'     => 'ttttt@mail.com',
                'SignupForm[password]'  => 'tester',
            ]
        );

        $I->See('Username should contain at least 2 characters.', '.help-block');
        $I->dontSee('Password cannot be blank.', '.help-block');
        $I->dontSee('Email cannot be blank.', '.help-block');
    }

    public function signupSuccessfully(FunctionalTester $I)
    {
        $I->submitForm($this->formId, [
            'SignupForm[username]' => 'tester',
            'SignupForm[email]' => 'tester.email@example.com',
            'SignupForm[password]' => 'tester_password',

        ]);

        $I->seeRecord('common\models\User', [
            'username' => 'tester',
            'email' => 'tester.email@example.com',
            'status' => \common\models\User::STATUS_INACTIVE
        ]);

        $I->seeEmailIsSent();
        $I->see('Thank you for registration. Please check your inbox for verification email.');
    }
}
