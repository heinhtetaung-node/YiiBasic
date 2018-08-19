<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Item';
$this->params['breadcrumbs'][] = $this->title;

$url = Url::to(['item/create']);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <a href="<?= $url ?>"><h3>Create</h3></a>
    <p>
        Item Desc
    </p>
    
</div>
