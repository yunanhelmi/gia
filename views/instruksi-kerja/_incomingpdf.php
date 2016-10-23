<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\models\Client;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

$this->title = "Outstanding Report";

?>
<div class="instruksi-kerja-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($this->title).' - '.$year ?></h2>
        </div>
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
                                <th>date of Last Correspondent</th>
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
                                <td><?php  echo $row["date_of_last_correspondent"] ?></td>
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
    </div>
</div>
