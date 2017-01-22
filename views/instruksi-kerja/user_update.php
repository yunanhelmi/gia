<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = 'Update User: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['user']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instruksi-kerja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formupdateuser', [
        'model' => $model,
    ]) ?>

</div>
