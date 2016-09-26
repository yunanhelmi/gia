<div class="form-group" id="add-instruksi-kerja">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'InstruksiKerja',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'case_number' => ['type' => TabularForm::INPUT_TEXT],
        'type_of_instruction' => ['type' => TabularForm::INPUT_TEXT],
        'date_of_instruction' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Date Of Instruction',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'assured' => ['type' => TabularForm::INPUT_TEXT],
        'broker' => ['type' => TabularForm::INPUT_TEXT],
        'conveyence' => ['type' => TabularForm::INPUT_TEXT],
        'interest' => ['type' => TabularForm::INPUT_TEXT],
        'date_of_loss' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Date Of Loss',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'detail_of_loss' => ['type' => TabularForm::INPUT_TEXT],
        'amount_of_claim' => ['type' => TabularForm::INPUT_TEXT],
        'sum_insured' => ['type' => TabularForm::INPUT_TEXT],
        'fee_code' => ['type' => TabularForm::INPUT_TEXT],
        'not_relevant' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ '0', '1', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Not Relevant'],
                    ]
        ],
        'protected' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ '0', '1', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Protected'],
                    ]
        ],
        'time_bar_due' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Time Bar Due',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'comment' => ['type' => TabularForm::INPUT_TEXT],
        'date_entered' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Date Entered',
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'adjuster' => ['type' => TabularForm::INPUT_TEXT],
        'actual_fee' => ['type' => TabularForm::INPUT_TEXT],
        'status' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'outstanding' => 'Outstanding', ' issued' => ' issued', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Status'],
                    ]
        ],
        'date_send_of_pa' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Date Send Of Pa',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'date_send_of_dfr' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Date Send Of Dfr',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'date_send_of_doc_request' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Date Send Of Doc Request',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'date_of_issued' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Date Of Issued',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'date_of_last_correspondent' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Date Of Last Correspondent',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'remark' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowInstruksiKerja(' . $key . '); return false;', 'id' => 'instruksi-kerja-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Instruksi Kerja', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowInstruksiKerja()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

