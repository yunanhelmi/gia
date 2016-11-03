<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Record]].
 *
 * @see Record
 */
class RecordQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Record[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Record|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}