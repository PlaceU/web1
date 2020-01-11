<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrganizationMember */

$this->title = 'Update Organization Member: ' . $model->OrganizationID;
$this->params['breadcrumbs'][] = ['label' => 'Organization Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->OrganizationID, 'url' => ['view', 'OrganizationID' => $model->OrganizationID, 'UserID' => $model->UserID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="organization-member-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
