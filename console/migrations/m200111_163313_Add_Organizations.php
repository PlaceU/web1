<?php

use yii\db\Migration;

/**
 * Class m200111_163313_Add_Organizations
 */
class m200111_163313_Add_Organizations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE Organization
            (
                ID INT NOT NULL AUTO_INCREMENT,
                Name VARCHAR(64) NOT NULL UNIQUE,
                CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (ID)
            );

            CREATE TABLE OrganizationMember
            (
                OrganizationID INT NOT NULL,
                UserID INT NOT NULL,
                CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (UserID) REFERENCES User (ID) ON DELETE CASCADE,
                FOREIGN KEY (OrganizationID) REFERENCES Organization (ID) ON DELETE CASCADE,
                CONSTRAINT UC_OrganizationMember UNIQUE (OrganizationID,UserID)
            );
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP TABLE IF EXISTS OrganizationMember;
                        DROP TABLE IF EXISTS Organization;");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200111_163313_Add_Organizations cannot be reverted.\n";

        return false;
    }
    */
}
