<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Stores;
use backend\models\Categories;
/* @var $this yii\web\View */
/* @var $model backend\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'stores_store_ID')->dropDownList(
        ArrayHelper::map(Stores::find()->all(),'store_ID','store_Name'),
        [
            'prompt'=>'Select Store',
            'onchange'=>'$.post("index.php?r=Categories/lists&id='.'"+$(this).val(), function( data ){
                $(select#models-contact).html( data );
            });'
        ]
    ) ?>
     <?= $form->field($model, 'categories_category_ID')->dropDownList(
        ArrayHelper::map(Categories::find()->all(),'category_ID','category_Name'),
        [
            'prompt'=>'Select Category',
            
        ]
    ) ?>

    <?= $form->field($model, 'book_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'book_Author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'book_Price')->textInput() ?>

    <?= $form->field($model, 'book_Pic')->textInput(['maxlength' => true]) ?>


 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
