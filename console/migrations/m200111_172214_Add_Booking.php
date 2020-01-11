<?php

use yii\db\Migration;

/**
 * Class m200111_172214_Add_Booking
 */
class m200111_172214_Add_Booking extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            SET SQL_MODE='ALLOW_INVALID_DATES';
            CREATE TABLE Booking
            (
                ID INT NOT NULL AUTO_INCREMENT,
                RoomID INT NOT NULL,
                UserID INT NOT NULL,
                CheckIn TIMESTAMP NOT NULL,
                CheckOut TIMESTAMP NOT NULL, 
                CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (UserID) REFERENCES User (ID) ON DELETE CASCADE,
                FOREIGN KEY (RoomID) REFERENCES Room (ID) ON DELETE CASCADE,
                PRIMARY KEY (ID)
            );
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP TABLE IF EXISTS Booking;");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200111_172214_Add_Booking cannot be reverted.\n";

        return false;
    }
    */
}
