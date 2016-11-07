<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstruksiKerjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'User Management';

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
        <?= Html::a('Create User', ['createUser'], ['class' => 'btn btn-success']) ?>
        
    </p>
    
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
                'save-as-new' => function($url) {
                    return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Save As New']);
                },
                'delete' => function($model){
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'index.php?r=instruksi-kerja/deleteuser', ['title' => 'Delete User']);
                },
            ],
        ],
       'username',
       'password',
       'role',
        
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'exportConfig'=> [
            GridView::CSV=>[
                'label' => 'CSV',
                'icon' => '',
                'iconOptions' => '',
                'showHeader' => false,
                'showPageSummary' => false,
                'showFooter' => false,
                'showCaption' => false,
                'filename' => 'yii',
                'alertMsg' => 'created',
                'options' => ['title' => 'Semicolon -  Separated Values'],
                'mime' => 'application/csv',
                'config' => [
                    'colDelimiter' => ";",
                    'rowDelimiter' => "\r\n",
                ], 
            ],
            GridView::PDF=>[
                'label' => 'PDF',
                'icon' => '',
                'iconOptions' => '',
                'showHeader' => false,
                'showPageSummary' => false,
                'showFooter' => false,
                'showCaption' => false,
                'filename' => 'yii',
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
        //         'target' => [
        //             ExportMenu::TARGET_BLANK,
        //         ],
        //         'fontAwesome' => true,
        //         'dropdownOptions' => [
        //             'label' => 'Full',
        //             'class' => 'btn btn-default',
        //             'exportConfig'=> [
        //                 GridView::CSV=>[
        //                     'label' => 'CSV',
        //                     'icon' => '',
        //                     'iconOptions' => '',
        //                     'showHeader' => false,
        //                     'showPageSummary' => false,
        //                     'showFooter' => false,
        //                     'showCaption' => false,
        //                     'filename' => 'yii',
        //                     'alertMsg' => 'created',
        //                     'options' => ['title' => 'Semicolon -  Separated Values'],
        //                     'mime' => 'application/csv',
        //                     'config' => [
        //                         'colDelimiter' => ";",
        //                         'rowDelimiter' => "\r\n",
        //                     ], 
        //                 ],
                        
        //             ],
        //             'itemsBefore' => [
        //                 '<li class="dropdown-header">Export All Data</li>',
        //             ],
        //         ],

        //     ]) ,
        // ],
    ]); ?>

</div>
