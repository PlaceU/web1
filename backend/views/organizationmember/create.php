<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrganizationMember */

$this->title = 'Create Organization Member';
$this->params['breadcrumbs'][] = ['label' => 'Organization Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-member-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
