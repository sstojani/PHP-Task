<?php

use app\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearchRequest $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<style>
.flash-message {
    position: fixed;
    top: 20px; /* Adjust as needed */
    right: 20px; /* Adjust as needed */
    max-width: 400px;
    padding: 10px;
    background-color: lightseagreen; /* Red color as an example, change as needed */
    color: white; /* Dark color for text, change as needed */
    border: 1px solid #f5c6cb; /* Border color, change as needed */
    border-radius: 5px;
    z-index: 9999; /* Ensure it's above other elements */
}
</style>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="flash-message">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background-color: lightseagreen; color: white;">
                    <?= Html::encode($this->title) ?>
                </div>
                <div class="card-body">
                    <p>
                        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            [
                                'attribute' => 'user_id',
                                'value' => function ($model) {
                                    return $model->user->username;
                                },
                            ],
                            'request_text:ntext',
                            'created_at',
                            [
                                'attribute' => 'status',
                                'value' => function ($model) {
                                    return $model->status == 0 ? 'Not Seen' : 'Seen';
                                }
                            ],
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Request $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'id' => $model->id]);
                                }
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
