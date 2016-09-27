<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

$this->title = 'Update Instruksi Kerja: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Instruksi Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instruksi-kerja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formincoming', [
        'model' => $model,
    ]) ?>

</div>
