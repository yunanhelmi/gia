<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->instruksiKerjas,
        'key' => 'id'
    ]);
    $gridColumns = [
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
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'instruksi-kerja'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
