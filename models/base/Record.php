<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "record".
 *
 * @property integer $id
 * @property integer $instruksi_kerja_id
 * @property string $time
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\InstruksiKerja $instruksiKerja
 */
class Record extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instruksi_kerja_id'], 'integer'],
            [['time', 'created_at', 'updated_at'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'record';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'instruksi_kerja_id' => 'Instruksi Kerja ID',
            'time' => 'Time',
            'description' => 'Description',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstruksiKerja()
    {
        return $this->hasOne(\app\models\InstruksiKerja::className(), ['id' => 'instruksi_kerja_id']);
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
     * @return \app\models\RecordQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\RecordQuery(get_called_class());
    }
}
