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
            
            <?php echo $form->field($model, 'role')->dropDownList(['sekretaris' => 'sekretaris', 'adjuster' => 'adjuster', 'applicant' => 'applicant'],['prompt'=>'Choose Role For User','onchange'=>'changeRole()']);?>
            <?= $form->field($model, 'client_id')->label(false)->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Client::find()->orderBy('created_at')->asArray()->all(), 'nama', 'nama'),['style' => 'display:none', 'id' => 'client']) ?>
        </div>
    </div>

    
    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <script>
    function changeRole(){
        if(document.getElementById('login-role').value == 'applicant'){
            $('#client').show();
        } else {
            $('#client').hide();
        }
    }
    </script>
</div>
