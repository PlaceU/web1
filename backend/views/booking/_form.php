<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RoomID')->textInput() ?>

    <?= $form->field($model, 'UserID')->textInput() ?>

    <?= $form->field($model, 'Start')->textInput() ?>

    <?= $form->field($model, 'Stop')->textInput() ?>

    <?= $form->field($model, 'CreatedAt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
