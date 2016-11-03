<?php

namespace app\models;

use \app\models\base\Record as BaseRecord;

/**
 * This is the model class for table "record".
 */
class Record extends BaseRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['instruksi_kerja_id'], 'integer'],
            [['time', 'created_at', 'updated_at'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100]
        ]);
    }
	
}
