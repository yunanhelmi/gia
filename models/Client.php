<?php

namespace app\models;

use \app\models\base\Client as BaseClient;

/**
 * This is the model class for table "client".
 */
class Client extends BaseClient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['alamat'], 'string'],
            [['nama', 'bisnis', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['telepon'], 'string', 'max' => 20]
        ]);
    }
	
}
