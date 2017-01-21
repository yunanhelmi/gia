<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "login".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $role
 */
class Login extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    public $email;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password','email', 'authKey', 'accessToken','client_id'], 'string', 'max' => 50],
            [['role'], 'string', 'max' => 10]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client Name',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'role' => 'Role',
        ];
    }

/**
     * @inheritdoc
     * @return array mixed
     */ 
    // public function behaviors()
    // {
    //     return [
    //         'timestamp' => [
    //             'class' => TimestampBehavior::className(),
    //             'createdAtAttribute' => 'created_at',
    //             'updatedAtAttribute' => 'updated_at',
    //             'value' => new \yii\db\Expression('NOW()'),
    //         ],
    //     ];
    // }

    /**
     * @inheritdoc
     * @return \app\models\LoginQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\LoginQuery(get_called_class());
    }
}
