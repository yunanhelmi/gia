<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[InstruksiKerja]].
 *
 * @see InstruksiKerja
 */
class InstruksiKerjaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return InstruksiKerja[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InstruksiKerja|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}