<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $ID
 * @property int $RoomID
 * @property int $UserID
 * @property string $Start
 * @property string $Stop
 * @property string $CreatedAt
 *
 * @property User $user
 * @property Room $room
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RoomID', 'UserID'], 'required'],
            [['RoomID', 'UserID'], 'integer'],
            [['Start', 'Stop', 'CreatedAt'], 'safe'],
            [['UserID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['UserID' => 'id']],
            [['RoomID'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['RoomID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'RoomID' => 'Room ID',
            'UserID' => 'User ID',
            'Start' => 'Start',
            'Stop' => 'Stop',
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
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['ID' => 'RoomID']);
    }
}
