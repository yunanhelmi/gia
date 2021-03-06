<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

//$this->title = $model->case_number;
// $this->params['breadcrumbs'][] = ['label' => 'Instruksi Kerja', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="instruksi-kerja-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= strtoupper($model->status).' '. Html::encode($model->case_number) ?></h2>
        </div>
    </div>

    <h4>Header</h4>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover active table-bordered table-sm">
                <tbody>
                  <tr class="active">
                    <th>Applicant</th>
                    <td><?= $model->client->nama ?></td>
                    <th>Assurers</th>
                    <td><?= $model->assurers ?></td>
                  </tr>
                </tbody>
                <tbody>
                  <tr class="active">
                    <th>Type Of Instruction</th>
                    <td><?= $model->type_of_instruction ?></td>
                    <th>Insured</th>
                    <td><?= $model->insured ?></td>
                  </tr>
                  <tr class="active">
                    <th>Case Number</th>
                    <td><?= $model->case_number ?></td>
                    <th>Broker</th>
                    <td><?= $model->broker ?></td>
                  </tr>
                  <tr class="active">
                    <th>Adjuster</th>
                    <td><?= $model->adjuster ?></td>
                    <th>Status</th>
                    <td><?= $model->status ?></td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
    <h4>Detail of Claim</h4>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>Conveyence</th>
                    <td><?= $model->conveyence?></td>
                    <th>Interest</th>
                    <td><?= $model->interest ?></td>
                  </tr>
                  <tr>
                    <th>Date Of Loss</th>
                    <td><?= $model->date_of_loss ?></td>
                    <th>Casuality</th>
                    <td><?= $model->casualty ?></td>
                  </tr>
                  <tr>
                    <th>Amount Of Loss (Rp)</th>
                    <td><?= number_format($model->amount_of_loss) ?></td>
                    <th>Amount Of Loss (USD)</th>
                    <td><?= number_format($model->amount_of_loss_usd) ?></td>
                  </tr>
                  <tr>
                    <th>Sum Insured (Rp)</th>
                    <td><?= number_format($model->sum_insured) ?></td>
                    <th>Sum Insured (USD)</th>
                    <td><?= number_format($model->sum_insured_usd) ?></td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
    <h4>Record</h4>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tbody>
                  <tr>
                      <td><strong>No.</strong></td>
                      <td><strong>Description</strong></td>
                      <td><strong>Notes</strong></td>
                      <td><strong>User</strong></td>
                      <?php if(Yii::$app->user->identity->role != 'applicant'){ ?>
                      <td><strong>Time Record</strong></td>
                      <?php }?>
                  </tr>
                  <?php
                  for($i=0;$i<sizeof($record);$i++){
                  ?>
                  <tr>
                      <td><?= $i+1 ?></td>
                      <td><?= $record[$i]['description']?></td>
                      <td><?= $record[$i]['keterangan']?></td>
                      <td><?= $record[$i]['user']?></td>
                      <?php if(Yii::$app->user->identity->role != 'applicant'){ ?>
                      <td><?= $record[$i]['created_at']?></td>
                      <?php }?>
                  </tr>
                  <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
