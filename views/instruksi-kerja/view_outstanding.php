<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

$this->title = 'Outstanding '.$model->case_number;
$this->params['breadcrumbs'][] = ['label' => 'Outstanding ', 'url' => ['outstanding']];
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
            
            <?= Html::a('Update', ['updateoutstanding', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <h4>Header</h4>
    <div class="alert alert-info" role="alert">
        <div class="row">
            <div class="col-md-4">
                <p><strong>Applicant</strong> : <?= $model->client->nama ?></p>
                <p><strong>Type Of Instruction</strong> : <?= $model->type_of_instruction ?></p>
                <p><strong>Case Number</strong> : <?= $model->case_number ?></p>
            </div>
            <div class="col-md-4">
                <p><strong>Assurers</strong> : <?= $model->assurers ?></p>
                <p><strong>Insured</strong> : <?= $model->insured ?></p>
                <p><strong>Broker</strong> : <?= $model->broker ?></p>
            </div>
            <div class="col-md-4">
                <p><strong>Adjuster</strong> : <?= $model->adjuster ?></p>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>Detail Of Claim</h4>
            <div class="alert alert-warning" role="alert">
                <div class="row">
                    <div class="col-md-8">
                        <p><strong>Conyenyence</strong> : <?= $model->conveyence?></p>
                        <p><strong>Interest</strong> : <?= $model->interest ?></p>
                        <p><strong>Date Of Loss</strong> : <?= $model->date_of_loss ?></p>
                        <p><strong>Casuality</strong> : <?= $model->casualty ?></p>
                        <p><strong>Amount Of Loss (Rp)</strong> : <?= $model->amount_of_loss ?></p>
                        <p><strong>Amount Of Loss (USD)</strong> : <?= $model->amount_of_loss_usd ?></p>
                        <p><strong>Sum Insured (Rp)</strong> : <?= $model->sum_insured ?></p>
                        <p><strong>Sum Insured (USD)</strong> : <?= $model->sum_insured_usd ?></p>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h4>Update</h4>
            <div class="alert alert-warning" role="alert">
                <div class="row">
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <?php 
            // $gridColumn = [
            //     ['attribute' => 'id', 'visible' => false],
            //     [
            //         'attribute' => 'client.id',
            //         'label' => 'Id Client',
            //     ],
            //     'case_number',
            //     'type_of_instruction',
            //     'date_of_instruction',
            //     'assurers',
            //     'insured',
            //     'broker',
            //     'conveyence',
            //     'interest',
            //     'date_of_loss',
            //     'casualty',
            //     'amount_of_loss',
            //     'amount_of_loss_usd',
            //     'sum_insured',
            //     'sum_insured_usd',
            //     'fee_code',
            //     'not_relevant',
            //     'protected',
            //     'time_bar_due',
            //     'time_bar_issue',
            //     'comment',
            //     'date_entered',
            //     'adjuster',
            //     'actual_fee',
            //     'actual_fee_usd',
            //     'expenses',
            //     'expenses_usd',
            //     'status',
            //     'date_send_of_pa',
            //     'date_send_of_dfr',
            //     'date_send_of_doc_request',
            //     'date_of_issued',
            //     'date_of_last_correspondent',
            //     'remark',
            // ];
            // echo DetailView::widget([
            //     'model' => $model,
            //     'attributes' => $gridColumn
            // ]); 
        ?>
    </div>
</div>
