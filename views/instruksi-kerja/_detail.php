<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

?>
<div class="instruksi-kerja-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
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
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>