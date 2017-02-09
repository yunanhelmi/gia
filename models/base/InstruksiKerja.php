<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "instruksi_kerja".
 *
 * @property integer $id
 * @property integer $id_client
 * @property string $case_number
 * @property string $type_of_instruction
 * @property string $date_of_instruction
 * @property string $assurers
 * @property string $insured
 * @property string $broker
 * @property string $conveyence
 * @property string $interest
 * @property string $date_of_loss
 * @property string $casualty
 * @property string $amount_of_loss
 * @property string $amount_of_loss_usd
 * @property string $sum_insured
 * @property string $sum_insured_usd
 * @property string $fee_code
 * @property string $fee_code_usd
 * @property string $not_relevant
 * @property string $protected
 * @property string $time_bar_due
 * @property string $time_bar_issue
 * @property string $comment
 * @property string $date_entered
 * @property string $adjuster
 * @property string $actual_fee
 * @property string $actual_fee_usd
 * @property string $expenses
 * @property string $expenses_usd
 * @property string $status
 * @property string $date_send_of_pa
 * @property string $date_send_of_dfr
 * @property string $date_send_of_doc_request
 * @property string $date_of_issued
 * @property string $date_of_last_correspondent
 * @property string $remark
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Client $client
 */
class InstruksiKerja extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    public $year_option;
    public $month_option;
    public $time_record;
    public $description_record;
    public $keterangan;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_client', 'amount_of_loss', 'amount_of_loss_usd', 'sum_insured', 'sum_insured_usd', 'fee_code', 'fee_code_rp', 'actual_fee', 'actual_fee_usd', 'expenses', 'expenses_usd'], 'integer'],
            [['date_of_instruction', 'date_of_loss', 'time_bar_due', 'date_entered', 'date_send_of_pa', 'date_send_of_dfr', 'date_send_of_doc_request', 'date_of_issued', 'date_of_last_correspondent'], 'safe'],
            [['not_relevant', 'protected', 'status'], 'string'],
            [['keterangan','description_record','month_option','time_record','case_number', 'type_of_instruction', 'assurers', 'insured', 'broker', 'conveyence', 'interest', 'casualty', 'time_bar_issue', 'comment', 'adjuster', 'remark', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['type_of_instruction','id_client','case_number','assurers','conveyence'],'required']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instruksi_kerja';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year_option' => 'Choose Year',
            'month_option' => 'Choose Month',
            'id_client' => 'Client',
            'case_number' => 'Case Number',
            'type_of_instruction' => 'Type Of Instruction',
            'date_of_instruction' => 'Date Of Instruction',
            'assurers' => 'Assurers',
            'insured' => 'Insured',
            'broker' => 'Broker',
            'conveyence' => 'Conveyence',
            'interest' => 'Interest',
            'date_of_loss' => 'Date Of Loss',
            'casualty' => 'Casualty',
            'amount_of_loss' => 'Amount Of Loss (Rp)',
            'amount_of_loss_usd' => 'Amount Of Loss (USD)',
            'sum_insured' => 'Sum Insured (Rp)',
            'sum_insured_usd' => 'Sum Insured (USD)',
            'fee_code' => 'Fee Code (USD)',
            'fee_code_rp' => 'Fee Code (Rp)',
            'not_relevant' => 'Not Relevant',
            'protected' => 'Protected',
            'time_bar_due' => 'Time Bar Due',
            'time_bar_issue' => 'Time Bar Issue',
            'comment' => 'Comment',
            'date_entered' => 'Date Entered',
            'adjuster' => 'Adjuster',
            'actual_fee' => 'Actual Fee (Rp)',
            'actual_fee_usd' => 'Actual Fee (USD)',
            'expenses' => 'Expenses (Rp)',
            'expenses_usd' => 'Expenses (USD)',
            'status' => 'Status',
            'date_send_of_pa' => 'Date Send Of Pa',
            'date_send_of_dfr' => 'Date Send Of Dfr',
            'date_send_of_doc_request' => 'Date Send Of Doc Request',
            'date_of_issued' => 'Date Of Issued',
            'date_of_last_correspondent' => 'Date Of Last Correspondent',
            'remark' => 'Remark',
            'time_record' => "Time Record",
            'description_record' => "Description Record",
            'keterangan' => "Additional Information",
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(\app\models\Client::className(), ['id' => 'id_client']);
    }

    /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getRecords() 
   { 
       return $this->hasMany(\app\models\Record::className(), ['instruksi_kerja_id' => 'id']); 
   }
        
    /**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\InstruksiKerjaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\InstruksiKerjaQuery(get_called_class());
    }
}
