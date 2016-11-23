<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "client".
 *
 * @property integer $id
 * @property string $nama
 * @property string $bisnis
 * @property string $alamat
 * @property string $telepon
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\InstruksiKerja[] $instruksiKerjas
 */
class Client extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alamat'], 'string'],
            [['nama', 'bisnis', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['telepon'], 'string', 'max' => 20]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'bisnis' => 'Bisnis',
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getInstruksiKerjas()
//    {
//        return $this->hasMany(\app\models\InstruksiKerja::className(), ['id_client' => 'id']);
//    }
    
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
     * @return \app\models\ClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ClientQuery(get_called_class());
    }
}
