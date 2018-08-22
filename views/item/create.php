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


<input type="hidden" id="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
<script
src="https://code.jquery.com/jquery-3.3.1.js"
integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous"></script>
<script type="text/javascript">   
$.ajax({
    url: 'ajax',
    type: 'POST',
    data: {'item_name':'abc', 'item_description':'abc', 'item_price':'100', 'cat_id': '', '_csrf':$('#_csrf').val()},
    success: function (data) {
        console.log(data);
    },
    error: function () {
        alert("Something went wrong");
    }
});       
</script>

</script>