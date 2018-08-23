<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\State */
/* @var $form yii\widgets\ActiveForm */

$countries=ArrayHelper::map($countries,'id','country_name');

?>

<div class="state-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_name')->textInput(['maxlength' => true])->label('State') ?>

    <?= $form->field($model, 'country_code')->textInput(['maxlength' => true])->label('Code') ?>

    <?= $form->field($model, 'country_id')->dropDownList($countries,['prompt'=>'Select Country']);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
