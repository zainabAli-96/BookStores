<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Stores */

$this->title = 'Create Stores';
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
