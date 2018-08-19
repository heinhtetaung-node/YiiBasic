<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Create';
$this->params['breadcrumbs'][] = "Item";
$this->params['breadcrumbs'][] = $this->title;

$url = Url::to(['item/create']);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_name') ?>
    <?= $form->field($model, 'item_description') ?>
    <?= $form->field($model, 'item_price') ?>

    <div class="form-control">
    	<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
