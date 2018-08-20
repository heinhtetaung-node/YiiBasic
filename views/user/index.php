<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;

$url = Url::to(['user/create']);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <a href="<?= $url ?>"><h3>Create</h3></a>
    <table class="table">
    	<tr>
    		<th>Id</th>
    		<th>User Name</th>
            <!-- <th>Password</th> -->
    		<th>Options</th>
    	</tr>
        <?php
        foreach($users as $i){
        	echo "<tr>";
        	echo "<td>".$i['id']."</td>";
        	echo "<td>".$i['username']."</td>";
            //echo "<td>".$i['username']."</td>";
            echo "<td>";
            echo "<a style='float: left; margin-right:5px' href='".Url::to(['user/edit', 'id' => $i['id']])."'><button class='btn btn-sm'>Edit</button></a>";

            //ActiveForm to go delete
            $form = ActiveForm::begin(['action' => ['user/delete'],'options' => ['method' => 'post']]);
            echo Html::hiddenInput('id', $i['id']);
            echo Html::submitButton('Delete', ['class' => 'btn btn-danger btn-sm']);
            ActiveForm::end();

            echo "</td>";         
        	echo "</tr>";
        }
        ?>
    </table>
    
</div>
