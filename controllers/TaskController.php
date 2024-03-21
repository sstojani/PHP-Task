<?php

namespace app\controllers;

use Yii;
use app\models\task;
use app\models\taskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TaskController implements the CRUD actions for task model.
 */
class TaskController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], 
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
        
            // Check if the user is an admin
            if (Yii::$app->user->can('admin')) {
                return true;
            }

            // Allow non-admin users to access the index action
            if (Yii::$app->user->can('user') && in_array($action->id, ['index', 'view'])) {
                return true;
            }

            // By default, deny access
            throw new \yii\web\ForbiddenHttpException('You are not allowed to perform this action.');
        }

        return false;
    }

    /**
     * Lists all task models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new taskSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if (Yii::$app->user->can('admin')) {
            
            $dataProvider->query->all();
        } else {
            
            $dataProvider->query->andFilterWhere(['assigned_to' => Yii::$app->user->id]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single task model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
{
    $model = new Task();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        $assignedTo = Yii::$app->request->post('Task')['assigned_to'];
        $model->assigned_to = (int) $model->assigned_to;
        if ($model->save()) {
            return $this->redirect(['index']);
        }
    }

    return $this->render('create', [
        'model' => $model,
    ]);
}

    /**
     * Updates an existing task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = task::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAssign($id)
{
    $task = Task::findOne($id);
    if (!$task) {
        throw new NotFoundHttpException('The requested task does not exist.');
    }

    if (Yii::$app->request->isPost) {
        $assignedTo = Yii::$app->request->post('assigned_to');
        $task->assigned_to = $assignedTo;
        if ($task->save()) {
            Yii::$app->session->setFlash('success', 'Task assigned successfully.');
        } else {
            Yii::$app->session->setFlash('error', 'Failed to assign task.');
        }
    }

    return $this->redirect(['view', 'id' => $task->id]);
}

    public function actionUpdateOrder()
{
    $request = Yii::$app->request;
    if ($request->isAjax) {
        $taskIds = $request->post('taskIds');
        Yii::debug('Received task IDs: ' . print_r($taskIds, true), 'app');

        if ($taskIds && is_array($taskIds)) {
            foreach ($taskIds as $index => $taskId) {
                Yii::debug('Updating task with ID ' . $taskId . ' to order ' . ($index + 1), 'app');
                Task::updateAll(['order' => $index + 1], ['id' => $taskId]);
            }
            return 'success';
        }
    }
    return 'error';
}

}
