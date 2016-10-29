<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

$this->title = 'Update Outstanding: ' . ' ' . $model->case_number;
$this->params['breadcrumbs'][] = ['label' => 'Outstanding', 'url' => ['outstanding']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instruksi-kerja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formoutstanding', [
        'model' => $model,
        'record' => $record,
    ]) ?>

</div>
