<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "organizationmember".
 *
 * @property int $OrganizationID
 * @property int $UserID
 * @property string $CreatedAt
 *
 * @property User $user
 * @property Organization $organization
 */
class OrganizationMember extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizationmember';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['OrganizationID', 'UserID'], 'required'],
            [['OrganizationID', 'UserID'], 'integer'],
            [['CreatedAt'], 'safe'],
            [['OrganizationID', 'UserID'], 'unique', 'targetAttribute' => ['OrganizationID', 'UserID']],
            [['UserID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['UserID' => 'id']],
            [['OrganizationID'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['OrganizationID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'OrganizationID' => 'Organization ID',
            'UserID' => 'User ID',
            'CreatedAt' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'UserID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['ID' => 'OrganizationID']);
    }
}
