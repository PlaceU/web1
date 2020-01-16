<?php


namespace common\tests\unit\models;

use Yii;
use common\models\Organization;
use common\fixtures\OrganizationFixture;

class OrganizationTest extends \Codeception\Test\Unit
{
    protected $tester;


    public function _fixtures()
    {
        return [
            'organization' => [
                'class' => OrganizationFixture::className(),
                //'dataFile' => codecept_data_dir() . 'organization.php'
            ]
        ];
    }


    public function testValidation()
    {
        $org = new Organization();

        $org->Name = null;
        $this->assertFalse($org->validate(['Name']));

        $org->Name = 'Organizacao LDA';
        $this->assertTrue($org->validate(['Name']));
    }

}