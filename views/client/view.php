<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['viewclient']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Client: '.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px; text-align: right">
            <?php /*             
                 Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                    ['pdf', 'id' => $model->id],
                    [
                        'class' => 'btn btn-danger',
                        'target' => '_blank',
                        'data-toggle' => 'tooltip',
                        'title' => 'Will open the generated PDF file in a new window'
                    ]
            ) */?>         
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
        <div class="col-md-12">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->errorSummary($model); ?>

            <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

            <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama', 'disabled' => 'true']) ?>

            <?= $form->field($model, 'bisnis')->textInput(['maxlength' => true, 'placeholder' => 'Bisnis', 'disabled' => 'true']) ?>

            <?= $form->field($model, 'alamat')->textarea(['rows' => 6, 'disabled' => 'true']) ?>

            <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'placeholder' => 'Telepon', 'disabled' => 'true']) ?>
            
            <?php ActiveForm::end(); ?>
            
        </div>
    
    </div>
    
    <div class="row">
<?php
// if($providerClient->totalCount){
//     $gridColumnClient = [
//         ['class' => 'yii\grid\SerialColumn'],
//             ['attribute' => 'id', 'visible' => false],
//             'nama',
//             'bisnis',
//             'alamat',
//             'telepon'
//     ];
//     echo Gridview::widget([
//         'dataProvider' => $providerClient,
//         'pjax' => true,
//         'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-client']],
//         'panel' => [
//             'type' => GridView::TYPE_PRIMARY,
//             'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Client'),
//         ],
//         'columns' => $gridColumnClient
//     ]);
// }
?>
    </div>
</div>
