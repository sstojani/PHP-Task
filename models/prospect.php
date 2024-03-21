<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Prospect extends ActiveRecord
{
    public static function tableName()
    {
        return 'prospect';
    }

    public function rules()
    {
        return [
            [['email', 'first_name', 'last_name'], 'required'],
            [['email', 'first_name', 'last_name', 'address', 'city', 'phone', 'fiscal_code'], 'string'],
            [['zip_code'], 'integer'],
            [['date'], 'safe'],
        ];
    }
}
