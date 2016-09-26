<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

$this->title = 'Save As New Instruksi Kerja: '. ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Instruksi Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="instruksi-kerja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
