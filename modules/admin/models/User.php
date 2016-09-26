<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\User as BaseUser;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 */
class User extends BaseUser
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
	    [['position', 'permission'], 'required', 'on' => 'update'],
            [['status'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['permission'], 'string'],
            [['auth_key'], 'string', 'max' => 32],
            [['position'], 'string', 'max' => 25],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
