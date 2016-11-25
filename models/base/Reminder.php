<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "reminder".
 *
 * @property integer $id
 * @property integer $id_instruksi
 * @property string $tgl_survei
 * @property string $tgl_aa
 * @property string $tgl_pa
 * @property string $tgl_csd
 * @property string $tgl_dfr
 * @property string $tgl_completed
 * @property string $state
 * @property string $created_at
 * @property string $updated_at
 */
class Reminder extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_instruksi'], 'integer'],
            [['tgl_survei', 'tgl_aa', 'tgl_pa', 'tgl_csd', 'tgl_dfr', 'tgl_completed', 'created_at', 'updated_at'], 'string', 'max' => 50],
            [['state'], 'string', 'max' => 5]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reminder';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_instruksi' => 'Id Instruksi',
            'tgl_survei' => 'Tgl Survei',
            'tgl_aa' => 'Tgl Aa',
            'tgl_pa' => 'Tgl Pa',
            'tgl_csd' => 'Tgl Csd',
            'tgl_dfr' => 'Tgl Dfr',
            'tgl_completed' => 'Tgl Completed',
            'state' => 'State',
        ];
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
     * @return \app\models\ReminderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ReminderQuery(get_called_class());
    }
}
