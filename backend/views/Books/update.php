<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Books */

$this->title = 'Update Books: ' . $model->book_ID;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->book_ID, 'url' => ['view', 'id' => $model->book_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="books-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
