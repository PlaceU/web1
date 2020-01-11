<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $ID
 * @property int $OrganizationID
 * @property string $Name
 * @property int $Chairs
 * @property string $CreatedAt
 *
 * @property Booking[] $bookings
 * @property Organization $organization
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['OrganizationID', 'Name', 'Chairs'], 'required'],
            [['OrganizationID', 'Chairs'], 'integer'],
            [['CreatedAt'], 'safe'],
            [['Name'], 'string', 'max' => 64],
            [['OrganizationID'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['OrganizationID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'OrganizationID' => 'Organization ID',
            'Name' => 'Name',
            'Chairs' => 'Chairs',
            'CreatedAt' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['RoomID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['ID' => 'OrganizationID']);
    }
}
