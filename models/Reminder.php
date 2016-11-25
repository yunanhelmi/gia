<?php

namespace app\models;

use \app\models\base\Reminder as BaseReminder;

/**
 * This is the model class for table "reminder".
 */
class Reminder extends BaseReminder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_instruksi'], 'integer'],
            [['tgl_survei', 'tgl_aa', 'tgl_pa', 'tgl_csd', 'tgl_dfr', 'tgl_completed', 'created_at', 'updated_at'], 'string', 'max' => 50],
            [['state'], 'string', 'max' => 5]
        ]);
    }
	
}
