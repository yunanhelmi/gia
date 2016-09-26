<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\AuthItem as BaseAuthItem;

/**
 * This is the model class for table "auth_item".
 */
class AuthItem extends BaseAuthItem
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64]
        ];
    }
	
}
