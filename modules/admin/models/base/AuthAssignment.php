<?php

namespace app\modules\admin\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property integer $user_id
 * @property integer $created_at
 *
 * @property \app\modules\admin\models\AuthItem $itemName
 */
class AuthAssignment extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_assignment';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(\app\modules\admin\models\AuthItem::className(), ['name' => 'item_name']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\admin\models\AuthAssignmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\AuthAssignmentQuery(get_called_class());
    }
}
