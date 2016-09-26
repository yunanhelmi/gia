<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\AuthAssignment as BaseAuthAssignment;

/**
 * This is the model class for table "auth_assignment".
 */
class AuthAssignment extends BaseAuthAssignment
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['item_name'], 'string', 'max' => 64]
        ];
    }
	
}
