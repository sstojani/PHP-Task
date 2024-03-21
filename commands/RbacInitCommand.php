<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\rbac\DbManager;

class RbacInitCommand extends Controller
{
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;

        // Define roles
        $admin = $auth->createRole('admin');
        $user = $auth->createRole('user');

        // Add roles to the authManager
        $auth->add($admin);
        $auth->add($user);

        // Define permissions
        $manageTasks = $auth->createPermission('manageTasks');
        $viewOwnTasks = $auth->createPermission('viewOwnTasks');
        $auth->add($manageTasks);
        $auth->add($viewOwnTasks);

        // Assign permissions to roles
        $auth->addChild($admin, $manageTasks);
        $auth->addChild($user, $viewOwnTasks);

        // Assign role to the first user (admin)
        $userId = 1;
        $auth->assign($admin, $userId);

        echo "RBAC initialization completed.\n";
    }
}
