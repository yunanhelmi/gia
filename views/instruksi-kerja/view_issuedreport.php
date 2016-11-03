<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

$this->title = 'Issued Report '.$model->case_number;
$this->params['breadcrumbs'][] = ['label' => 'Issued Report', 'url' => ['issuedreport']];
$this->params['breadcrumbs'][] = $model->case_number;
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
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#detail" aria-controls="home" role="tab" data-toggle="tab"><strong>Detail Of Claim</strong></a></li>
            <li role="presentation"><a href="#update" aria-controls="profile" role="tab" data-toggle="tab"><strong>Update</strong></a></li>
            <li role="presentation"><a href="#status" aria-controls="messages" role="tab" data-toggle="tab"><strong>Status and Recovery Aspect</strong></a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="detail">
                <br>
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
            <div role="tabpanel" class="tab-pane" id="update">
                <?php if($record != null){ ?>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Time</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                      </table>
                    </div>
                <?php } else { ?>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Time</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                      </table>
                    </div>
                <?php } ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="status">
                <br>
                <div class="row">
                    <div class="col-md-8">
                        <p><strong>Status</strong> : <?= $model->status?></p>
                    </div>
                </div>
            </div>
            
          </div>
        </div>   
    </div>
    
</div>
