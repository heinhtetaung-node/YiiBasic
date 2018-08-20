<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $title;
$this->params['breadcrumbs'][] = "Category";
$this->params['breadcrumbs'][] = $this->title;

$url = Url::to(['category/create']);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat_name') ?>
    
    <div class="form-control">
    	<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
