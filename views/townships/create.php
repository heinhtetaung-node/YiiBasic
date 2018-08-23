<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Townships */

$this->title = 'Create Townships';
$this->params['breadcrumbs'][] = ['label' => 'Townships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="townships-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
