<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = 'Update Client: ' . ' ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['viewclient']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
