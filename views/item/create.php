<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = $title;
$this->params['breadcrumbs'][] = "Item";
$this->params['breadcrumbs'][] = $this->title;
$categories=ArrayHelper::map($categories,'id','cat_name');

$url = Url::to(['item/create']);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_name') ?>
    <?= $form->field($model, 'item_description') ?>
    <?= $form->field($model, 'item_price') ?>
    
    <?= $form->field($model, 'cat_id')->dropDownList($categories,['prompt'=>'Select Category']);
    ?>
    <div class="form-control">
    	<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
