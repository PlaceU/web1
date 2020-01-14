<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RoomID')->textInput() ?>

    <?= $form->field($model, 'UserID')->textInput() ?>

    <?= DateTimePicker::widget([
        'model' => $model,
        'attribute' => 'CheckIn',
        'language' => 'en',
        'size' => 'ms',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd MM yyyy - HH:ii P',
            'todayBtn' => true
        ]
    ]);?>

    <?= DateTimePicker::widget([
        'model' => $model,
        'attribute' => 'CheckOut',
        'language' => 'en',
        'size' => 'ms',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd MM yyyy - HH:ii P',
            'todayBtn' => true
        ]
    ]);?>

    <?= $form->field($model, 'CreatedAt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
