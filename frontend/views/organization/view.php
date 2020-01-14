<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dataProvider1 yii\data\ActiveDataProvider */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="organization-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Name',
            'CreatedAt',
        ],
    ]) ?>

    <h2>Rooms</h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            //'OrganizationID',
            'Name',
            'Chairs',
            'CreatedAt',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <h2>Bookings</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'RoomID',
            'UserID',
            'CheckIn',
            'CheckOut',
            'CreatedAt',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
