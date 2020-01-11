<?php

use yii\db\Migration;

/**
 * Class m200111_165323_Add_Buildings
 */
class m200111_165323_Add_Buildings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE Building
            (
                ID INT NOT NULL AUTO_INCREMENT,
                OrganizationID INT NOT NULL,
                Name VARCHAR(64) NOT NULL,
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
        $this->execute("DROP TABLE IF EXISTS Building;");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200111_165323_Add_Buildings cannot be reverted.\n";

        return false;
    }
    */
}
