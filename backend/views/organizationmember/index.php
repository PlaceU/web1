<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organization Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-member-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Organization Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'OrganizationID',
            'UserID',
            'CreatedAt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
