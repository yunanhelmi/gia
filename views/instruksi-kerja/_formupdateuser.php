<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Client */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="instruksi-kerja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?>
            <?= $form->field($model, 'password')->textInput(['maxlength' => true, 'placeholder' => 'Password']) ?>
            
            <?= $form->field($model, 'role')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Login::find()->orderBy('id')->asArray()->distinct()->all(), 'role', 'role'),
                    'options' => ['placeholder' => 'Choose Status'],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],

                ]); 
                ?>
        </div>
    </div>

    
    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
