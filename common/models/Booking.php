<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Booking".
 *
 * @property int $ID
 * @property int $RoomID
 * @property int $UserID
 * @property string $CheckIn
 * @property string $CheckOut
 * @property string $CreatedAt
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RoomID', 'UserID'], 'required'],
            [['RoomID', 'UserID'], 'integer'],
            [['CheckIn', 'CheckOut', 'CreatedAt'], 'safe'],
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
            'CheckIn' => 'Check In',
            'CheckOut' => 'Check Out',
            'CreatedAt' => 'Created At',
        ];
    }
}
