<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstruksiKerjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Instruksi Kerja';
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
        <?= Html::a('Create Instruksi Kerja', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        // [
        //     'class' => 'kartik\grid\ExpandRowColumn',
        //     'width' => '50px',
        //     'value' => function ($model, $key, $index, $column) {
        //         return GridView::ROW_COLLAPSED;
        //     },
        //     'detail' => function ($model, $key, $index, $column) {
        //         return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
        //     },
        //     'headerOptions' => ['class' => 'kartik-sheet-style'],
        //     'expandOneOnly' => true
        // ],
        ['attribute' => 'id', 'visible' => false],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{save-as-new} {view} {update} {delete}',
            'buttons' => [
                'save-as-new' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Save As New']);
                },
            ],
        ],
        [
                'attribute' => 'id_client',
                'label' => 'Id Client',
                'value' => function($model){
                    return $model->client->nama;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Client::find()->asArray()->all(), 'id', 'nama'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Client', 'id' => 'grid-instruksi-kerja-search-id_client']
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
        // 'actual_fee',
        // 'status',
        // 'date_send_of_pa',
        // 'date_send_of_dfr',
        // 'date_send_of_doc_request',
        // 'date_of_issued',
        // 'date_of_last_correspondent',
        // 'remark',
        
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-instruksi-kerja']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]) ,
        ],
    ]); ?>

</div>
