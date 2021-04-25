<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Stores;

/* @var $this yii\web\View */
/* @var $model backend\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'stores_store_ID')->dropDownList(
        ArrayHelper::map(Stores::find()->all(),'store_ID','store_Name'),
        
        ['prompt'=>'Select Store']
    ) ?>
    <?= $form->field($model, 'category_Name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
