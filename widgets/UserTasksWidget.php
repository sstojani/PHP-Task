<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Task;

class UserTasksWidget extends Widget
{
    public function run()
    {
        $tasks = Task::find()
            ->where(['assigned_to' => Yii::$app->user->id])
            ->orderBy(['order' => SORT_ASC])
            ->all();

        return $this->render('user-tasks', [
            'tasks' => $tasks,
        ]);
    }
}