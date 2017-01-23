<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstruksiKerjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use app\models\Client;

$this->title = 'Issued';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="instruksi-kerja-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('searchissued', ['model' => $searchModel, 'adjuster' => $adjuster]); ?>
    </div>
    <?php 
        if(Yii::$app->user->identity->role == 'admin' || Yii::$app->user->identity->role == 'adjuster')
        { 
            $gridColumn = [
                ['class' => 'kartik\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
                // [
                //     'attribute' => 'id_client',
                //     'label' => 'Client Name',
                //     'value' => function($model){
                //         return $model->client->nama;
                //     },
                //     'filterType' => GridView::FILTER_SELECT2,
                //     'filter' => \yii\helpers\ArrayHelper::map(\app\models\Client::find()->asArray()->all(), 'id', 'nama'),
                //     'filterWidgetOptions' => [
                //         'pluginOptions' => ['allowClear' => true],
                //     ],
                //     'filterInputOptions' => ['placeholder' => 'Client', 'id' => 'grid-instruksi-kerja-search-id_client']
                // ],
                [                     
                    'format' => 'html',
                    'attribute' => 'case_number',
                    'vAlign' => 'middle',
                    //'hAlign' => 'center',
                    'label' => 'Case Number',
                    'pageSummary' => 'Total',
                    //'contentOptions'=>['style'=>'max-width: 50px;'],
                    'content' => function($model){
                        $date = date_create($model->date_of_instruction);
                        return "
                            <table style='width:100%'>
                                <tr>
                                    <td> <strong>$model->case_number</strong></td>
                                </tr>
                                <tr>
                                    <td>DOI ".date_format($date,'d/m/Y')."</td>
                                </tr>
                            </table>
                        ";
                        }
                ],
                // [
                //     'attribute' => 'date_of_instruction',
                //     'format' => ['date', 'php:d/m/Y']
                // ],
                [
                    'attribute' => 'assurers',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'value' => function($model){
                        if($model->assurers == NULL)
                            return '';
                        else
                            return $model->assurers;
                    }, 
                ],
                [
                    'attribute' => 'insured',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'value' => function($model){
                        if($model->insured == NULL)
                            return '';
                        else
                            return $model->insured;
                    }, 
                ],
                [
                    'attribute' => 'broker',
                    'vAlign' => 'middle',
                    'hAlign' => 'center', 
                    'value' => function($model){
                        if($model->broker == NULL)
                            return '';
                        else
                            return $model->broker;
                    }, 
                ],
                [
                    'attribute' => 'conveyence',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'value' => function($model){
                        if($model->conveyence == NULL)
                            return '';
                        else
                            return $model->conveyence;
                    }, 
                ],
                [
                    'attribute' => 'casualty',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'value' => function($model){
                        if($model->casualty == NULL)
                            return '';
                        else
                            return $model->casualty;
                    },
                ],
                // 'interest',
                // 'date_of_loss',
                // 'detail_of_loss',
                // 'amount_of_loss',
                // 'amount_of_loss_usd',
                // 'sum_insured',
                // 'sum_insured_usd',
                [
                    'attribute' => 'fee_code',
                    'vAlign' => 'middle',
                    'hAlign' => 'right',
                    'format' => ['decimal', 0],
                    'pageSummary' => true,
                    'value' => function($model){
                        if($model->fee_code == NULL)
                            return '';
                        else
                            return $model->fee_code;
                    },
                    // 'value' => function ($model, $key, $index, $widget) {
                    //     return $model->fee_code;
                    // },
                    // 'footer' => number_format($fee_code),
                ],
                [
                    'attribute' => 'fee_code_rp',
                    'vAlign' => 'middle',
                    'hAlign' => 'right',
                    'format' => ['decimal', 0],
                    'pageSummary' => true,
                    'value' => function($model){
                        if($model->fee_code_rp == NULL)
                            return '';
                        else
                            return $model->fee_code_rp;
                    },
                    // 'value' => function ($model, $key, $index, $widget) {
                    //     return $model->fee_code_rp;
                    // },
                    // 'footer' => number_format($fee_code_rp),
                ],
                // 'not_relevant',
                // 'protected',
                // 'time_bar_due',
                // 'time_bar_issue',
                // 'comment',
                //'date_entered',
                [
                    'attribute' => 'adjuster',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'value' => function($model){
                        if($model->adjuster == NULL)
                            return '';
                        else
                            return $model->adjuster;
                    }, 
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => ' {view} {edit}',
                    'buttons' => [
                        'view' => function ($url, $model){
                            return Html::a('detail', 'index.php?r=instruksi-kerja/viewissued&id='.$model->id);
                        },
                        'edit' => function ($url,$model){
                            if(Yii::$app->user->identity->role == 'admin'){
                                return Html::a('change status', 'index.php?r=instruksi-kerja/changestatus&id='.$model->id);
                            }
                        }
                    ],
                ],
                // 'actual_fee',
                // 'actual_fee_usd',
                // 'expenses',
                // 'expenses_usd',
                // 'status',
                // 'date_send_of_pa',
                // 'date_send_of_dfr',
                // 'date_send_of_doc_request',
                // 'date_of_issued',
                // 'date_of_last_correspondent',
                // 'remark',
                
            ];
        }
        else
        {
            $gridColumn = [
                ['class' => 'kartik\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
                [                     
                    'format' => 'html',
                    'attribute' => 'case_number',
                    'vAlign' => 'middle',
                    //'hAlign' => 'center',
                    'label' => 'Case Number',
                    'pageSummary' => 'Total',
                    //'contentOptions'=>['style'=>'max-width: 50px;'],
                    'content' => function($model){
                        $date = date_create($model->date_of_instruction);
                        return "
                            <table style='width:100%'>
                                <tr>
                                    <td> <strong>$model->case_number</strong></td>
                                </tr>
                                <tr>
                                    <td>DOI ".date_format($date,'d/m/Y')."</td>
                                </tr>
                            </table>
                        ";
                        }
                ],
                [
                    'attribute' => 'assurers',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'value' => function($model){
                        if($model->assurers == NULL)
                            return '';
                        else
                            return $model->assurers;
                    }, 
                ],
                [
                    'attribute' => 'insured',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'value' => function($model){
                        if($model->insured == NULL)
                            return '';
                        else
                            return $model->insured;
                    }, 
                ],
                [
                    'attribute' => 'broker',
                    'vAlign' => 'middle',
                    'hAlign' => 'center', 
                    'value' => function($model){
                        if($model->broker == NULL)
                            return '';
                        else
                            return $model->broker;
                    }, 
                ],
                [
                    'attribute' => 'conveyence',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'value' => function($model){
                        if($model->conveyence == NULL)
                            return '';
                        else
                            return $model->conveyence;
                    }, 
                ],
                [
                    'attribute' => 'casualty',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'value' => function($model){
                        if($model->casualty == NULL)
                            return '';
                        else
                            return $model->casualty;
                    },
                ],
                [
                    'attribute' => 'adjuster',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'value' => function($model){
                        if($model->adjuster == NULL)
                            return '';
                        else
                            return $model->adjuster;
                    }, 
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => ' {view} ',
                    'buttons' => [
                        'view' => function ($url, $model){
                            return Html::a('detail', 'index.php?r=instruksi-kerja/viewissued&id='.$model->id);
                        }
                    ],
                ],
            ];
        }  
    ?>
    <?php
         // Header and Footer options for PDF format
        $ourPdfHeader = [
            'L' => [
                'content'   => 'Issued',
                'font-size' => 8,
                'color'     => '#333333'
            ],
            'C' => [
                'content'   => 'PT Global Internusa Adjusting',
                'font-size' => 16,
                'color'     => '#333333'
            ],
            'R' => [
                'content'   => 'Generated' . ': ' . date("D, d-M-Y g:i a T"),
                'font-size' => 8,
                'color'     => '#333333'
            ]
        ];
        $ourPdfFooter = [
            'L'    => [
                'content'    => '',
                'font-size'  => 8,
                'color'      => '#999999'
            ],
            'C' => [
                'content'   => '<p>5<sup>th</sup> Fl. Gedung Kompas Gramedia, Jl. Raya Jemursari No. 64, Surabaya</p>',
                'font-size' => 16,
                'color'     => '#333333'
            ],
            'R'    => [
                'content'     => '[ {PAGENO} ]',
                'font-size'   => 10,
                'font-style'  => 'B',
                'font-family' => 'serif',
                'color'       => '#333333'
            ],
            'line' => TRUE,
        ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'showPageSummary' => true,
        'pageSummaryRowOptions' => ['class' => 'kv-page-summary warning', 'style' => 'font-weight:bold'],
        'exportConfig'=> [
             GridView::EXCEL=>[
                'label' => 'Excel',
                'icon' => '',
                'iconOptions' => '',
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => false,
                'showCaption' => false,
                'filename' => 'Outstanding',
                'alertMsg' => 'created',
                'options' => ['title' => 'Microsoft Excel 95+'],
                'mime' => 'application/vnd.ms-excel',
                'config' => [
                    //'colDelimiter' => ";",
                    //'rowDelimiter' => "\r\n",
                ], 
            ],
            GridView::PDF=>[
                'label' => 'PDF',
                'icon' => '',
                'iconOptions' => '',
                'showHeader' => true,
                'showPageSummary' => false,
                'showFooter' => false,
                'showCaption' => false,
                'filename' => 'Issued',
                'alertMsg' => 'created',
                'options' => ['title' => 'Portable Document Format'],
                'mime' => 'application/pdf',
                'config' => [
                    //'cssInline' => '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}',
                    'methods' => [
                        'SetHeader' => [
                            ['odd' => $ourPdfHeader, 'even' => $ourPdfHeader]
                        ],
                        'SetFooter' => [
                            ['odd' => $ourPdfFooter, 'even' => $ourPdfFooter]
                        ],
                    ],
                ],
            ],
        ],
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-instruksi-kerja']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        // 'toolbar' => [
        //     '{export}',
        //     ExportMenu::widget([
        //         'dataProvider' => $dataProvider,
        //         'columns' => $gridColumn,
        //         'target' => ExportMenu::TARGET_BLANK,
        //         'fontAwesome' => true,
        //         'dropdownOptions' => [
        //             'label' => 'Full',
        //             'class' => 'btn btn-default',
        //             'itemsBefore' => [
        //                 '<li class="dropdown-header">Export All Data</li>',
        //             ],
        //         ],
        //     ]) ,
        // ],
    ]); ?>

</div>
