<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerjaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-instruksi-kerja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['issued'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-md-4">
            

            <?= $form->field($model, 'case_number')->textInput(['maxlength' => true, 'placeholder' => 'Case Number']) ?>
            <?php $type_of_instruction = ["Cargo Damage" =>"Cargo Damage", "Hull Survey" => "Hull Survey", "Risks Survey" => "Risks Survey", "Carrier's Liability" => "Carrier's Liability"]; ?>
            <?= $form->field($model, 'type_of_instruction')->label("Type of Instruction")->widget(\kartik\widgets\Select2::classname(), [
                'data' => $type_of_instruction,
                'options' => ['placeholder' => 'Choose Type of Instruction'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
            <?= $form->field($model, 'casualty')->textInput(['maxlength' => true, 'placeholder' => 'Casualty']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'id_client')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Client::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                'options' => ['placeholder' => 'Choose Assurer'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
            <?= $form->field($model, 'insured')->textInput(['maxlength' => true, 'placeholder' => 'Insured']) ?>
            <?= $form->field($model, 'conveyence')->textInput(['maxlength' => true, 'placeholder' => 'Conveyence']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'adjuster')->label("Adjuster")->widget(\kartik\widgets\Select2::classname(), [
                'data' => $adjuster,
                'options' => ['placeholder' => 'Adjuster'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
            <?= 
            // $form->field($model, 'date_of_instruction')->widget(\kartik\datecontrol\DateControl::classname(), [
            //     'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
            //     'saveFormat' => 'php:Y-m-d',
            //     'ajaxConversion' => true,
            //     'options' => [
            //         'pluginOptions' => [
            //             'placeholder' => 'Choose Date Of Instruction',
            //             'autoclose' => true
            //         ]
            //     ],
            //     ]); 
            $form->field($model, 'date_of_issued')->label("Year of Issued")->widget(\kartik\widgets\Select2::classname(), [
                'data' => $tahun,
                'options' => ['placeholder' => 'Choose Year'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
            
        </div>
    </div>

    <?php /* echo $form->field($model, 'assured')->textInput(['maxlength' => true, 'placeholder' => 'Assured']) */ ?>

    <?php /* echo $form->field($model, 'broker')->textInput(['maxlength' => true, 'placeholder' => 'Broker']) */ ?>

    <?php /* echo $form->field($model, 'conveyence')->textInput(['maxlength' => true, 'placeholder' => 'Conveyence']) */ ?>

    <?php /* echo $form->field($model, 'interest')->textInput(['maxlength' => true, 'placeholder' => 'Interest']) */ ?>

    <?php /* echo $form->field($model, 'date_of_loss')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Of Loss',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'detail_of_loss')->textInput(['maxlength' => true, 'placeholder' => 'Detail Of Loss']) */ ?>

    <?php /* echo $form->field($model, 'amount_of_claim')->textInput(['maxlength' => true, 'placeholder' => 'Amount Of Claim']) */ ?>

    <?php /* echo $form->field($model, 'sum_insured')->textInput(['maxlength' => true, 'placeholder' => 'Sum Insured']) */ ?>

    <?php /* echo $form->field($model, 'fee_code')->textInput(['maxlength' => true, 'placeholder' => 'Fee Code']) */ ?>

    <?php /* echo $form->field($model, 'not_relevant')->dropDownList([ '0', '1', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'protected')->dropDownList([ '0', '1', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'time_bar_due')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Time Bar Due',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'comment')->textInput(['maxlength' => true, 'placeholder' => 'Comment']) */ ?>

    <?php /* echo $form->field($model, 'date_entered')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Entered',
                'autoclose' => true,
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'adjuster')->textInput(['maxlength' => true, 'placeholder' => 'Adjuster']) */ ?>

    <?php /* echo $form->field($model, 'actual_fee')->textInput(['maxlength' => true, 'placeholder' => 'Actual Fee']) */ ?>

    <?php /* echo $form->field($model, 'status')->dropDownList([ 'outstanding' => 'Outstanding', ' issued' => ' issued', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'date_send_of_pa')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Send Of Pa',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'date_send_of_dfr')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Send Of Dfr',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'date_send_of_doc_request')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Send Of Doc Request',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'date_of_issued')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Of Issued',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'date_of_last_correspondent')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date Of Last Correspondent',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
