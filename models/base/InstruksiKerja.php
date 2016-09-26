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
 * @property string $assured
 * @property string $broker
 * @property string $conveyence
 * @property string $interest
 * @property string $date_of_loss
 * @property string $detail_of_loss
 * @property string $amount_of_claim
 * @property string $sum_insured
 * @property string $fee_code
 * @property string $not_relevant
 * @property string $protected
 * @property string $time_bar_due
 * @property string $comment
 * @property string $date_entered
 * @property string $adjuster
 * @property string $actual_fee
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_client'], 'integer'],
            [['date_of_instruction', 'date_of_loss', 'time_bar_due', 'date_entered', 'date_send_of_pa', 'date_send_of_dfr', 'date_send_of_doc_request', 'date_of_issued', 'date_of_last_correspondent'], 'safe'],
            [['not_relevant', 'protected', 'status'], 'string'],
            [['case_number', 'type_of_instruction', 'assured', 'broker', 'conveyence', 'interest', 'detail_of_loss', 'amount_of_claim', 'sum_insured', 'fee_code', 'comment', 'adjuster', 'actual_fee', 'remark', 'created_at', 'updated_at'], 'string', 'max' => 255]
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
            'id_client' => 'Id Client',
            'case_number' => 'Case Number',
            'type_of_instruction' => 'Type Of Instruction',
            'date_of_instruction' => 'Date Of Instruction',
            'assured' => 'Assured',
            'broker' => 'Broker',
            'conveyence' => 'Conveyence',
            'interest' => 'Interest',
            'date_of_loss' => 'Date Of Loss',
            'detail_of_loss' => 'Detail Of Loss',
            'amount_of_claim' => 'Amount Of Claim',
            'sum_insured' => 'Sum Insured',
            'fee_code' => 'Fee Code',
            'not_relevant' => 'Not Relevant',
            'protected' => 'Protected',
            'time_bar_due' => 'Time Bar Due',
            'comment' => 'Comment',
            'date_entered' => 'Date Entered',
            'adjuster' => 'Adjuster',
            'actual_fee' => 'Actual Fee',
            'status' => 'Status',
            'date_send_of_pa' => 'Date Send Of Pa',
            'date_send_of_dfr' => 'Date Send Of Dfr',
            'date_send_of_doc_request' => 'Date Send Of Doc Request',
            'date_of_issued' => 'Date Of Issued',
            'date_of_last_correspondent' => 'Date Of Last Correspondent',
            'remark' => 'Remark',
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
