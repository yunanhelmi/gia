<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="instruksi-kerja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'id_client')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Client::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
        'options' => ['placeholder' => 'Choose Client'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'case_number')->textInput(['maxlength' => true, 'placeholder' => 'Case Number']) ?>

    <?= $form->field($model, 'type_of_instruction')->textInput(['maxlength' => true, 'placeholder' => 'Type Of Instruction']) ?>

    <?= $form->field($model, 'date_of_instruction')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Of Instruction',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'assured')->textInput(['maxlength' => true, 'placeholder' => 'Assured']) ?>

    <?= $form->field($model, 'broker')->textInput(['maxlength' => true, 'placeholder' => 'Broker']) ?>

    <?= $form->field($model, 'conveyence')->textInput(['maxlength' => true, 'placeholder' => 'Conveyence']) ?>

    <?= $form->field($model, 'interest')->textInput(['maxlength' => true, 'placeholder' => 'Interest']) ?>

    <?= $form->field($model, 'date_of_loss')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Of Loss',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'detail_of_loss')->textInput(['maxlength' => true, 'placeholder' => 'Detail Of Loss']) ?>

    <?= $form->field($model, 'amount_of_claim')->textInput(['maxlength' => true, 'placeholder' => 'Amount Of Claim']) ?>

    <?= $form->field($model, 'sum_insured')->textInput(['maxlength' => true, 'placeholder' => 'Sum Insured']) ?>

    <?= $form->field($model, 'fee_code')->textInput(['maxlength' => true, 'placeholder' => 'Fee Code']) ?>

    <?= $form->field($model, 'not_relevant')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'protected')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'time_bar_due')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Time Bar Due',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true, 'placeholder' => 'Comment']) ?>

    <?= $form->field($model, 'date_entered')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Entered',
                'autoclose' => true,
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'adjuster')->textInput(['maxlength' => true, 'placeholder' => 'Adjuster']) ?>

    <?php  echo $form->field($model, 'actual_fee')->textInput(['maxlength' => true, 'placeholder' => 'Actual Fee']) ?>

    <?php echo $form->field($model, 'status')->dropDownList([ 'outstanding' => 'Outstanding', ' issued' => ' issued', ], ['prompt' => '']) ?>

    <?php  echo $form->field($model, 'date_send_of_pa')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Send Of Pa',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?php  echo $form->field($model, 'date_send_of_dfr')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Send Of Dfr',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?php  echo $form->field($model, 'date_send_of_doc_request')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Send Of Doc Request',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?php  echo $form->field($model, 'date_of_issued')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Of Issued',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?php  echo  $form->field($model, 'date_of_last_correspondent')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Of Last Correspondent',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?php echo $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) ?>

    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>