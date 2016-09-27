<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

$this->title = 'Incoming '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Incoming', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->id;
?>
<div class="instruksi-kerja-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?=  Html::encode($this->title) ?></h2>
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
            <?= Html::a('Save As New', ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a('Update', ['updateincoming', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
        [
            'attribute' => 'client.id',
            'label' => 'Id Client',
        ],
        'case_number',
        'type_of_instruction',
        'date_of_instruction',
        'assurers',
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
        // 'actual_fee',
        // 'status',
        // 'date_send_of_pa',
        // 'date_send_of_dfr',
        // 'date_send_of_doc_request',
        // 'date_of_issued',
        // 'date_of_last_correspondent',
        // 'remark',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
