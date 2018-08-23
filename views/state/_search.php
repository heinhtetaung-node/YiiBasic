<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\StateSearch */
/* @var $form yii\widgets\ActiveForm */

$countries=ArrayHelper::map($countries,'id','country_name');

?>

<div class="state-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'country_name')->label('State') ?>

    <?= $form->field($model, 'country_code')->label('Code') ?>

    <?= $form->field($model, 'country_id')->dropDownList($countries,['prompt'=>'Select Country']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
