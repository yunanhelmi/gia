<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'position')->widget(\kartik\widgets\Select2::classname(), [
               'data' => ['Staff' => 'Staff', 'Manager' => 'Manager', 'Administrator' => 'Administrator'],
               'options' => ['placeholder' => 'Choose Position'],
               'pluginOptions' => [
                  'allowClear' => true
               ],
           ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'auth_key')->textInput(['readOnly' => true, 'maxlength' => true, 'placeholder' => 'Auth Key']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'password_hash')->textInput(['readOnly' => true, 'maxlength' => true, 'placeholder' => 'Password Hash']) ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'permission')->multiselect(ArrayHelper::map(\app\modules\admin\models\AuthItem::find()->where('name != "admin"')->asArray()->all(), 'name', 'description'), [
                  'height' => '200px',
                  'container' => ['class' => 'bg-white'],
              ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
