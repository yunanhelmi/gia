<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Client'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
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
            <?= Html::a('Save As New', ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
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
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'nama',
        'bisnis',
        'alamat:ntext',
        'telepon',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerInstruksiKerja->totalCount){
    $gridColumnInstruksiKerja = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'case_number',
            'type_of_instruction',
            'date_of_instruction',
            'assured',
            'broker',
            'conveyence',
            'interest',
            'date_of_loss',
            'detail_of_loss',
            'amount_of_claim',
            'sum_insured',
            'fee_code',
            'not_relevant',
            'protected',
            'time_bar_due',
            'comment',
            'date_entered',
            'adjuster',
            'actual_fee',
            'status',
            'date_send_of_pa',
            'date_send_of_dfr',
            'date_send_of_doc_request',
            'date_of_issued',
            'date_of_last_correspondent',
            'remark',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerInstruksiKerja,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-instruksi-kerja']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Instruksi Kerja'),
        ],
        'columns' => $gridColumnInstruksiKerja
    ]);
}
?>
    </div>
</div>
