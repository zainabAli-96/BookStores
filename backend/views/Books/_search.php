<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BooksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'book_ID') ?>

    <?= $form->field($model, 'book_Name') ?>

    <?= $form->field($model, 'book_Author') ?>

    <?= $form->field($model, 'book_Price') ?>

    <?= $form->field($model, 'book_Pic') ?>

    <?php // echo $form->field($model, 'stores_store_ID') ?>

    <?php // echo $form->field($model, 'categories_category_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
