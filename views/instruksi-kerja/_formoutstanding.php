<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="instruksi-kerja-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 5, 'deviceSize' => ActiveForm::SIZE_SMALL],
    ]); ?>

    <?php // $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <h4>Header</h4>
    <div class="alert alert-info" role="alert">
        
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'id_client')->label('Applicant')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Client::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                    'options' => ['placeholder' => 'Choose Client'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'readonly' => true,
                    ],
                    'disabled' => true,
                ]); 
                ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'assurers')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Client::find()->orderBy('id')->asArray()->all(), 'nama', 'nama'),
                    'options' => ['placeholder' => 'Choose Client'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],

                ]); 
                ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'adjuster')->textInput(['maxlength' => true, 'placeholder' => 'Adjuster']) ?>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?php 
                    $type_of_instruction = ["Cargo Damage" =>"Cargo Damage", "Hull Survey" => "Hull Survey", "Risks Survey" => "Risks Survey", "Carrier's Liability" => "Carrier's Liability"];
                    echo $form->field($model, 'type_of_instruction')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => $type_of_instruction,
                        'options' => ['placeholder' => 'Choose Type Of Instruction'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'insured')->textInput(['maxlength' => true, 'placeholder' => 'Insured']) ?>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'case_number')->textInput(['readOnly' => true,'maxlength' => true, 'placeholder' => 'Case Number']) ?>
                
            </div>
            <div class="col-md-4">
               <?= $form->field($model, 'broker')->textInput(['maxlength' => true, 'placeholder' => 'Broker']) ?>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
    </div>
    <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#doc" aria-controls="home" role="tab" data-toggle="tab"><strong>Detail Of Claim</strong></a></li>
    <li role="presentation"><a href="#record" aria-controls="profile" role="tab" data-toggle="tab"><strong>Update</strong></a></li>
    <li role="presentation"><a href="#status" aria-controls="profile" role="tab" data-toggle="tab"><strong>Status & Recovery Aspect</strong></a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="doc">
        <br>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'conveyence')->textInput(['readOnly' => true,'maxlength' => true, 'placeholder' => 'Conveyence']) ?>
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
                ]); 
                ?>
                <?= $form->field($model, 'casualty')->textInput(['maxlength' => true, 'placeholder' => 'Casualty']) ?>
                
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'amount_of_loss', [
                        'addon' => ['prepend' => ['content'=>'Rp']]
                    ])->widget(\yii\widgets\MaskedInput::className(),[
                    'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,
                    ],
                ])->label('Amount Of Loss')->textInput(['maxlength' => true, 'placeholder' => 'Amount Of Loss']); ?>
                <?= $form->field($model, 'amount_of_loss_usd',[
                        'addon' => ['prepend' => ['content'=>'USD']]
                    ])->widget(\yii\widgets\MaskedInput::className(),[
                    'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,
                    ],
                ])->label("")->textInput(['maxlength' => true, 'placeholder' => 'Amount Of Loss']) ?>

                <?= $form->field($model, 'sum_insured', [
                        'addon' => ['prepend' => ['content'=>'Rp']]
                    ])->widget(\yii\widgets\MaskedInput::className(),[
                    'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,
                    ],
                ])->label('Sum Insured')->textInput(['maxlength' => true, 'placeholder' => 'Sum Insured']); ?>
                <?= $form->field($model, 'sum_insured_usd',[
                        'addon' => ['prepend' => ['content'=>'USD']]
                    ])->widget(\yii\widgets\MaskedInput::className(),[
                    'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,
                    ],
                ])->label("")->textInput(['maxlength' => true, 'placeholder' => 'Sum Insured']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'fee_code', [
                        'addon' => ['prepend' => ['content'=>'Rp']]
                    ])->widget(\yii\widgets\MaskedInput::className(),[
                    'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,
                    ],
                ])->label('Fee Code')->textInput(['maxlength' => true, 'placeholder' => 'Fee Code']); ?>
                <?= $form->field($model, 'fee_code_usd',[
                        'addon' => ['prepend' => ['content'=>'USD']]
                    ])->widget(\yii\widgets\MaskedInput::className(),[
                    'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,
                    ],
                ])->label("")->textInput(['maxlength' => true, 'placeholder' => 'Fee Code']) ?>
                
                <?= $form->field($model, 'expenses', [
                        'addon' => ['prepend' => ['content'=>'Rp']]
                    ])->widget(\yii\widgets\MaskedInput::className(),[
                    'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,
                    ],
                ])->label('Expenses')->textInput(['maxlength' => true, 'placeholder' => 'Expenses']); ?>
                <?= $form->field($model, 'expenses_usd',[
                        'addon' => ['prepend' => ['content'=>'USD']]
                    ])->widget(\yii\widgets\MaskedInput::className(),[
                    'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,
                    ],
                ])->label("")->textInput(['maxlength' => true, 'placeholder' => 'Expenses']) ?>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="record">
        <br>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'status')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\InstruksiKerja::find()->orderBy('id')->asArray()->distinct()->all(), 'status', 'status'),
                    'options' => ['placeholder' => 'Choose Status'],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],

                ]); 
                ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-7">
                <table class="table">
                    <tr>
                        <td><?php echo $form->field($model, 'time_record')->textInput(['readonly'=>true,'placeholder'=> date('Y-m-d')]) ?></td>
                        <td><?php 
                            $type_of_description = [
                                "Survey" =>"Survey", 
                                "Attandance Advice (AA)" => "Attandance Advice (AA)", 
                                "Preliminary Advice (PA)" => "Preliminary Advice (PA)", 
                                "Chasing Support Documents (CSD)" => "Chasing Support Documents (CSD)",
                                "Draft Final Report (DFR)" => "Draft Final Report (DFR)",
                                ];
                            echo $form->field($model, 'description_record')->widget(\kartik\widgets\Select2::classname(), [
                                'data' => $type_of_description,
                                'options' => ['placeholder' => 'Choose Status'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]); ?>
                        </td>
                    </tr>
                    
                    
                </table>

            </div>
            <div class="col-md-5">
                <table class="table">
                    <tr>
                        <td><strong>Time</strong></td>
                        <td><strong>Description</strong></td>
                    </tr>
                    <?php
                    // echo "<pre>";
                    // var_dump($record);
                    // echo "</pre>";
                    // exit(); 
                    if($record != NULL){
                    ?>
                    <tr>
                        <td><?= $record->time?></td>
                        <td><?= $record->description?></td>
                    </tr>
                    <?php } else {?>
                    <tr>
                        <td>contoh waktu</td>
                        <td>contoh deskripsi</td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        
    </div>
     <div role="tabpanel" class="tab-pane" id="status">
        <br>
        <div class="row">
            <div class="col-md-4">
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
                ]); 
                ?>
            </div>    
            <div class="col-md-4">
                <?= $form->field($model, 'comment')->textArea(['rows' => '6','placeholder' => 'Comment']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'time_bar_issue')->radioList(array('Relevant' => 'Relevant', 'Protected' => 'Protected')); ?>

            </div>
        </div>
        
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <div class="form-group pull-right">
            <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?php endif; ?>
            <?php if(Yii::$app->controller->action->id != 'create'): ?>
                
            <?php endif; ?>
                <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
        </div>
    </div>
  </div>
    

        <?php ActiveForm::end(); ?>

</div>
