<?php
namespace frontend\tests\acceptance;

use common\fixtures\UserFixture;
use common\fixtures\RoomFixture;
use common\fixtures\BookingFixture;
use common\fixtures\OrganizationFixture;
use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class BookingCest
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
            'Booking' => [
                'class' => BookingFixture::className(),
            ],
        ];
    }

    public function testCreateBooking(AcceptanceTester $I, RoomCest $room, OrganizationCest $org, LoginCest $login)
    {
        $room->testCreateRoom($I, $org, $login);
        
        $I->amOnPage(Url::toRoute('/booking'));

        $I->click('Create Booking');
        $I->wait(1);


        $I->executeJS('document.getElementsByName("Booking[CheckIn]")[0].removeAttribute("readonly")');
        $I->executeJS('document.getElementsByName("Booking[CheckOut]")[0].removeAttribute("readonly")');

        $I->fillField('Booking[RoomID]', 1);
        $I->fillField('Booking[CheckIn]', '10 January 2020 - 10:00 PM');
        $I->fillField('Booking[CheckOut]', '10 January 2020 - 11:30 PM');


        $I->click('Save');
        $I->wait(1);

        $I->see('Update');
        $I->see('Delete');
    }
}
