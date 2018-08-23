<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Townships */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="townships-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'township_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'township_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->textInput() ?>

    <?= $form->field($model, 'state_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
