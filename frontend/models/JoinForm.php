<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class JoinForm extends Model
{
    public $orgName;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // orgName are required
            [['orgName'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'orgName' => 'Organization Name',
        ];
    }
}
