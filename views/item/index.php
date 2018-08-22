<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

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
            <th>Category</th>
    		<th>Name</th>
    		<th>Price</th>
    		<th>Description</th>
            <th>Options</th>
    	</tr>
        <?php
        foreach($items as $i){
        	echo "<tr>";
        	echo "<td>".$i['id']."</td>";
            echo "<td>".$i['c_name']."</td>";
        	echo "<td>".$i['item_name']."</td>";
        	echo "<td>".$i['item_price']."</td>";
        	echo "<td>".$i['item_description']."</td>";        	
            echo "<td>";
            echo "<a style='float: left; margin-right:5px' href='".Url::to(['item/edit', 'id' => $i['id']])."'><button class='btn btn-sm'>Edit</button></a>";

            //ActiveForm to go delete
            $form = ActiveForm::begin(['action' => ['item/delete'],'options' => ['method' => 'post']]);
            echo Html::hiddenInput('id', $i['id']);
            echo Html::submitButton('Delete', ['class' => 'btn btn-danger btn-sm']);
            ActiveForm::end();

            echo "</td>";         
        	echo "</tr>";
        }
        ?>
    </table>    
    <?php
    echo LinkPager::widget([
        'pagination' => $pagination,
    ]);
    ?>
        
</div>
