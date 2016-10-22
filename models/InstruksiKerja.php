<?php

namespace app\models;

use \app\models\base\InstruksiKerja as BaseInstruksiKerja;

/**
 * This is the model class for table "instruksi_kerja".
 */
class InstruksiKerja extends BaseInstruksiKerja
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_client', 'amount_of_loss', 'amount_of_loss_usd', 'sum_insured', 'sum_insured_usd', 'fee_code', 'actual_fee', 'actual_fee_usd', 'expenses', 'expenses_usd'], 'integer'],
            [['date_of_instruction', 'date_of_loss', 'time_bar_due', 'date_entered', 'date_send_of_pa', 'date_send_of_dfr', 'date_send_of_doc_request', 'date_of_issued', 'date_of_last_correspondent'], 'safe'],
            [['not_relevant', 'protected', 'status'], 'string'],
            [['case_number', 'type_of_instruction', 'assurers', 'insured', 'broker', 'conveyence', 'interest', 'casualty', 'time_bar_issue', 'comment', 'adjuster', 'remark', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
}
