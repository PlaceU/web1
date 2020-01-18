<?php


namespace common\tests\unit\models;

use Yii;
use common\models\User;
use common\fixtures\UserFixture;

class UserTest extends \Codeception\Test\Unit
{
    protected $tester;


    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ];
    }


    public function testValidation()
    {
        $user = new User();

        $user->username = null;
        $this->assertFalse($user->validate(['username']));

        $user->username = 'nelsan';
        $this->assertTrue($user->validate(['username']));
    }



}