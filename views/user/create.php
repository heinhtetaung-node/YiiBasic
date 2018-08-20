<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $title;
$this->params['breadcrumbs'][] = "User";
$this->params['breadcrumbs'][] = $this->title;

$url = Url::to(['user/create']);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username') ?>
    

    <?php
    if($model->id==""){
    	echo $form->field($model, 'password')->passwordInput();    
    }else{    	
    	?>
    	<div class="form-group">
    		<label>Password</label>
    		<input class="form-control" type="password" value="" name="password">
    	</div>
    	<?php
    }    
    ?>
    
    <div class="form-control">
    	<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
