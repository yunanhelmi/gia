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
        <?= Html::a('Create User', ['createuser'], ['class' => 'btn btn-success']) ?>
        
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
       'username',
       'password',
       [                     
            'format' => 'html',
            'attribute' => 'role',
            'label' => 'Role',
            'content' => function($model){
                if($model->role == 'applicant'){
                    return "
                        <table style='width:100%'>
                            <tr>
                                <td> $model->role</td>
                            </tr>
                            <tr>
                                <td>Client: $model->client_id</td>
                            </tr>
                        </table>
                    ";
                } else {
                    return "
                        <table style='width:100%'>
                            <tr>
                                <td> $model->role</td>
                            </tr>
                        </table>
                    ";
                }
            }
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'header' => 'Action',
            'buttons' => [
                'update' => function ($model) {
                    $test = explode("=", $model);
                    $url = "instruksi-kerja/updateuser";
                    return Html::a('update <br>', [$url, 'id' => $test[2]], ['title' => 'Update']);
                },
                'delete' => function ($model) {
                    $test = explode("=", $model);
                    $url = "instruksi-kerja/deleteuser";
                    return Html::a('delete', [$url, 'id' => $test[2]], ['title' => 'Delete']);
                },
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
