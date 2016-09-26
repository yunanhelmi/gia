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
            [['id_client'], 'integer'],
            [['date_of_instruction', 'date_of_loss', 'time_bar_due', 'date_entered', 'date_send_of_pa', 'date_send_of_dfr', 'date_send_of_doc_request', 'date_of_issued', 'date_of_last_correspondent'], 'safe'],
            [['not_relevant', 'protected', 'status'], 'string'],
            [['case_number', 'type_of_instruction', 'assured', 'broker', 'conveyence', 'interest', 'detail_of_loss', 'amount_of_claim', 'sum_insured', 'fee_code', 'comment', 'adjuster', 'actual_fee', 'remark', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
}
