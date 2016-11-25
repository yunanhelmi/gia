<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Reminder]].
 *
 * @see Reminder
 */
class ReminderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Reminder[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Reminder|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}