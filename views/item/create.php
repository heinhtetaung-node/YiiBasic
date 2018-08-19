<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Create';
$this->params['breadcrumbs'][] = "Item";
$this->params['breadcrumbs'][] = $this->title;

$url = Url::to(['item/create']);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    
    
</div>
