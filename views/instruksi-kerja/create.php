<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

$this->title = 'Create Instruksi Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Incoming', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instruksi-kerja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formincoming', [
        'model' => $model,
    ]) ?>

</div>
