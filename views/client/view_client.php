<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['viewclient']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="client-view">
    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Client'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px; text-align: right">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>         
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->errorSummary($model); ?>
        <div class="col-md-4">
            <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

            <?= $form->field($model, 'nama')->textInput(['readOnly' => true,'maxlength' => true]) ?>

            <?= $form->field($model, 'bisnis')->textInput(['readOnly' => true, 'maxlength' => true]) ?>

            <?= $form->field($model, 'alamat')->textarea(['readOnly' => true, 'rows' => 6]) ?>

            <?= $form->field($model, 'telepon')->textInput(['readOnly' => true, 'maxlength' => true]) ?>
        </div>
    </div>
    
    <div class="row">
    </div>
</div>
