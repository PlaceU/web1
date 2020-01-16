<?php


namespace common\tests\unit\models;

use Yii;
use common\models\Room;
use common\fixtures\RoomFixture;

class RoomTest extends \Codeception\Test\Unit
{
    protected $tester;

    public function _fixtures()
    {
        return [
            'room' => [
                'class' => RoomFixture::className(),
                //'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ];
    }


    public function testValidationChairs()
    {
        $room = new Room();

        $room->Chairs = null;
        $this->assertFalse($room->validate(['Chairs']));

        $room->Chairs = 15;
        $this->assertTrue($room->validate(['Chairs']));
    }

}