<?php

use yii\db\Migration;

/**
 * Class m200111_170619_Add_Room
 */
class m200111_170619_Add_Room extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE Room
            (
                ID INT NOT NULL AUTO_INCREMENT,
                OrganizationID INT NOT NULL,
                Name VARCHAR(64) NOT NULL,
                Chairs INT NOT NULL,
                CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (OrganizationID) REFERENCES Organization (ID) ON DELETE CASCADE,
                PRIMARY KEY (ID)
            );
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP TABLE IF EXISTS Room;");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200111_170619_Add_Room cannot be reverted.\n";

        return false;
    }
    */
}
