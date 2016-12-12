<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

$this->title = 'Outstanding '.$model->case_number;
$this->params['breadcrumbs'][] = ['label' => 'Outstanding ', 'url' => ['outstanding']];
$this->params['breadcrumbs'][] = $model->case_number;
?>
<div class="instruksi-kerja-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?=  Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px; text-align: right">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-print"></i> ' . 'PDF', 
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
            <div class="col-md-12">
                <table style="width:100%">
                    <tr>
                        <td><strong>Applicant</strong></td>
                        <td>: <?= $model->client->nama ?></td>
                        <td><strong>Assurers</strong></td>
                        <td>: <?= $model->assurers ?></td>
                        <td><strong>Adjuster</strong></td>
                        <td>: <?= $model->adjuster ?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Type Of Instruction</strong></td>
                        <td>: <?= $model->type_of_instruction ?></td>
                        <td><strong>Insured</strong></td>
                        <td>: <?= $model->insured ?></td>
                        <td><strong>Date of Instruction</strong></td>
                        <td>: <?= $model->date_of_instruction ?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Case Number</strong></td>
                        <td>: <?= $model->case_number ?></td>
                        <td><strong>Broker</strong></td>
                        <td>: <?= $model->broker ?></td>
                        <td><strong>Date Entered</strong></td>
                        <td>: <?= $model->date_entered ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#detail" aria-controls="home" role="tab" data-toggle="tab"><strong>Detail Of Claim</strong></a></li>
            <li role="presentation"><a href="#update" aria-controls="profile" role="tab" data-toggle="tab"><strong>Update & Status</strong></a></li>
            <li role="presentation"><a href="#status" aria-controls="messages" role="tab" data-toggle="tab"><strong>Recovery Aspect</strong></a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="detail">
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <table style="width:100%">
                            <tr>
                                <td><strong>Conveyence</strong></td>
                                <td>: <?= $model->conveyence?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td><strong>Interest</strong></td>
                                <td>: <?= $model->interest?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td><strong>Date Of Loss</strong></td>
                                <td>: <?= $model->date_of_loss?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td><strong>Date Of Loss</strong></td>
                                <td>: <?= $model->date_of_loss?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td><strong>Casuality</strong></td>
                                <td>: <?= $model->casualty?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td><strong>Amount Of Loss</strong></td>
                                <td>: Rp <?= number_format($model->amount_of_loss)?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td></strong></td>
                                <td>: USD <?= number_format($model->amount_of_loss_usd)?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td><strong>Sum Insured</strong></td>
                                <td>: Rp <?= number_format($model->sum_insured)?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td><strong></strong></td>
                                <td>: USD <?= number_format($model->sum_insured_usd)?></td>
                            </tr>
                        </table>
                    </div>
                    
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="update">
                <?php if($record != null){ ?>
                    <div class="table-responsive">
                      <table class="table">
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>: <?= $model->status?></td>
                            </tr>
                            <tr>
                                <td><strong>User</strong></td>
                                <td><strong>Time Record</strong></td>
                                <td><strong>Description</strong></td>
                                <td><strong>Notes</strong></td>
                                <td><strong>Time Created</strong></td>
                            </tr>
                            
                            <?php
                            for($i=sizeof($record)-1;$i>=0;$i--){
                            ?>
                            <tr>
                                <td><?= $record[$i]['user']?></td>
                                <td><?= $record[$i]['time']?></td>
                                <td><?= $record[$i]['description']?></td>
                                <td><?= $record[$i]['keterangan']?></td>
                                <td><?= $record[$i]['created_at']?></td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                <?php } else { ?>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>: <?= $model->status?></td>
                            </tr>
                            <tr>
                                <td><strong>User</strong></td>
                                <td><strong>Time Record</strong></td>
                                <td><strong>Description</strong></td>
                                <td><strong>Notes</strong></td>
                                <td><strong>Time Created</strong></td>
                            </tr>
                        </thead>
                      </table>
                    </div>
                <?php } ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="status">
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <table style="width:100%">
                            <tr>
                                <td><strong>Time Bar Due</strong></td>
                                <td>: <?= $model->time_bar_due?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td><strong>Comment</strong></td>
                                <td>: <?= $model->comment?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td><strong>Time Bar Issue</strong></td>
                                <td>: <?= $model->time_bar_issue?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
          </div>
        </div>   
    </div>
</div>
