<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OrganizationMember */

$this->title = $model->OrganizationID;
$this->params['breadcrumbs'][] = ['label' => 'Organization Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="organization-member-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'OrganizationID' => $model->OrganizationID, 'UserID' => $model->UserID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'OrganizationID' => $model->OrganizationID, 'UserID' => $model->UserID], [
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
            'OrganizationID',
            'UserID',
            'CreatedAt',
        ],
    ]) ?>

</div>
