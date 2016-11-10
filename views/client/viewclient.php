<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Client';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Client', ['create'], ['class' => 'btn btn-success']) ?>
        <?php // Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        
        ['attribute' => 'id', 'visible' => false],
        'nama',
        'bisnis',
        'alamat:ntext',
        'telepon',
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Action',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'view' => function ($url, $model){
                    return Html::a('detail<br>', 'index.php?r=client/view&id='.$model->id);
                },
                'update' => function ($model) {
                    $test = explode("=", $model);
                    $url = "client/update";
                    return Html::a('update<br>', [$url, 'id' => $test[2]], ['title' => 'Update']);
                },
                'delete' => function ($url, $model, $key)
                {
                     return Html::a('delete', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                  ]);
               }
            ],
        ],
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-client']],
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
