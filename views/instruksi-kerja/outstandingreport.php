<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\models\Client;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

$this->title = 'Outstanding Report ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instruksi-kerja-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group col-lg-12">
                <label>Select Year: </label>
                <select onchange="if (this.value) window.location.href=this.value" class="form-control">
                    <option default> Select </option>
                    <?php for($i = 0;$i<sizeof($tahun);$i++){ ?> 
                    <option value="index.php?r=instruksi-kerja/outstandingreport&year=<?= $tahun[$i]['year']?>"><?= $tahun[$i]['year']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4" style="margin-top: 15px; text-align: right">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['printoutstandingreport', 'id' => $tahun],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>
        </div>
    </div>
    <div class="row">
        <!-- <pre>
            <?= var_dump($model) ?>
        </pre> -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">     
            <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Case No</th>
                                <th>Instruction Date</th>
                                <th>Conveyance</th>
                                <th>DOL</th>
                                <th>Casualty</th>
                                <th>Client</th>
                                <th>Broker</th>
                                <th>Assured</th>
                                <th>Fee Code</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        
                        <?php foreach ($model as $row): ?>
                            <tr>
                                <td><?php  echo $row["case_number"] ?></td>
                                <td><?php  echo date("j F Y", strtotime($row["date_of_instruction"]));?></td>
                                <td><?php  echo $row["conveyence"] ?></td>
                                <td><?php  echo $row["date_of_loss"] ?></td>
                                <td><?php  echo $row["casualty"] ?></td>
                                <?php
                                    if($row["id_client"] == null){
                                        $nama['nama'] = "-";
                                    }else {
                                        $nama = Client::find()->select('nama')->where('id = '.$row["id_client"].'')->asArray()->one(); 
                                    }
                                ?>
                                <td><?php  echo $nama['nama'] ?></td>
                                <td><?php  echo $row["broker"] ?></td>
                                <td><?php  echo $row["assurers"] ?></td>
                                <td><?php  echo $row["fee_code"] ?></td>
                                <td><?php  echo $row["remark"] ?></td>
                            </tr>
                            
                        <?php endforeach ?> 
                    </table>
                </div>
                <div class="text-right">
                    
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        <!-- /.col-lg-12 -->
    </div>

</div>
