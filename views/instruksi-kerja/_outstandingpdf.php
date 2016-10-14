<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

$this->title = "test";

?>
<div class="instruksi-kerja-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Instruksi Kerja'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
        <pre>
            <?= var_dump($model) ?>
        </pre>
    </div>
</div>
