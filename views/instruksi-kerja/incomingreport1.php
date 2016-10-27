<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstruksiKerjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Incoming Report';
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
        <?=  $this->render('searchincomingreport', ['model' => $searchModel, 'tahun' => $tahun]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
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
        'case_number',
        [
            'attribute' => 'date_of_instruction',
            'format' => ['date', 'php:d/m/Y']
        ],
        'assurers',
        'insured',
        'broker',
        'conveyence',
        // 'interest',
        'date_of_loss',
        'casualty',
        // 'detail_of_loss',
        // 'amount_of_loss',
        // 'amount_of_loss_usd',
        // 'sum_insured',
        // 'sum_insured_usd',
        'fee_code',
        // 'not_relevant',
        // 'protected',
        // 'time_bar_due',
        // 'time_bar_issue',
        // 'comment',
        // 'date_entered',
        // 'adjuster',
        'actual_fee',
        'actual_fee_usd',
        'expenses',
        'expenses_usd',
        // 'status',
        // 'date_send_of_pa',
        // 'date_send_of_dfr',
        // 'date_send_of_doc_request',
        // 'date_of_issued',
        // 'date_of_last_correspondent',
        'remark',
        
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'exportConfig'=> [
            GridView::PDF=>[
                'label' => 'PDF',
                'icon' => '',
                'iconOptions' => '',
                'showHeader' => false,
                'showPageSummary' => false,
                'showFooter' => false,
                'showCaption' => false,
                'filename' => 'Incoming Report PT. GIA',
                'alertMsg' => 'created',
                'options' => ['title' => 'Semicolon -  Separated Values'],
                'mime' => 'application/pdf',
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