<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Request extends ActiveRecord
{
    public $verifyCode;

    public static function tableName()
    {
        return 'request';
    }

    public function rules()
    {
        return [
            [['request_text', 'verifyCode'], 'required'],
            ['verifyCode', 'captcha'],
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->user_id = Yii::$app->user->id;
            $this->created_at = date('Y-m-d H:i:s');
            $this->status = 0;
        }

        return parent::beforeSave($insert);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
