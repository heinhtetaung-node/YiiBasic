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
    <table class="table">
    	<tr>
    		<th>Id</th>
    		<th>Name</th>
    		<th>Price</th>
    		<th>Description</th>
    	</tr>
        <?php
        foreach($items as $i){
        	echo "<tr>";
        	echo "<td>".$i['id']."</td>";
        	echo "<td>".$i['item_name']."</td>";
        	echo "<td>".$i['item_price']."</td>";
        	echo "<td>".$i['item_description']."</td>";        	
        	echo "</tr>";
        }
        ?>
    </table>
    
</div>
