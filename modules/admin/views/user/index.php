<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Management';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
        Modal::begin([
            'header' => '<h4>Add New User</h4>',
            'id' => 'modalSignUp',
            'size' => 'modal-md',
        ]);
        echo "<div id='modalContentSignUp'></div>";
        Modal::end();
    ?>

    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'class' => 'yii\grid\ActionColumn',
        ],
        'username',
        [
            'attribute' => 'position',
            'value' => function($model){
                return $model['position'];
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => ['Staff' => 'Staff', 'Manager' => 'Manager', 'Administrator' => 'Administrator'],
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Position', 'id' => 'grid-admin-user-search-position']
        ],
        'password_hash',
        'email:email',
        // 'status',
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-division']],
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => false,
            'before'=> Html::button('<i class="glyphicon glyphicon-plus"></i>', ['value' => Url::to('index.php?r=site/signup'), 'class' => 'btn btn-success', 'id' => 'modalButtonSignUp']).' '.
                        Html::a('<i class="glyphicon glyphicon-search"></i>', '#', ['class' => 'btn btn-info search-button']),
        ],
    ]); ?>

</div>
