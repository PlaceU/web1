<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property int $ID
 * @property string $Name
 * @property string $CreatedAt
 *
 * @property Organizationmember[] $organizationmembers
 * @property User[] $users
 * @property Room[] $rooms
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['CreatedAt'], 'safe'],
            [['Name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Name' => 'Name',
            'CreatedAt' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationmembers()
    {
        return $this->hasMany(Organizationmember::className(), ['OrganizationID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'UserID'])->viaTable('organizationmember', ['OrganizationID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['OrganizationID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['RoomID' => 'ID'])->viaTable('room', ['OrganizationID' => 'ID']);
    }

    /**
     * Finds user by id
     *
     * @param int $id
     * @return static|null
     */
    public static function findByUsername($id)
    {
        return static::findOne(['id' => $id]);
    }
}
