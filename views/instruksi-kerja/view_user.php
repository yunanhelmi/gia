<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['user']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instruksi-kerja-view">

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
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'password',
        'role',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
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
