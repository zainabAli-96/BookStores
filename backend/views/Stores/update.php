<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Stores */

$this->title = 'Update Stores: ' . $model->store_ID;
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->store_ID, 'url' => ['view', 'id' => $model->store_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
