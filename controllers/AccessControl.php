<?php

namespace app\controllers;

use Yii;
use yii\base\ActionFilter;
use yii\web\ForbiddenHttpException;

class AccessControl extends ActionFilter
{
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            throw new ForbiddenHttpException('You are not allowed to access this page.');
        }

        return parent::beforeAction($action);
    }
}
