<?php

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TaskSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tasks';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="task-index" style="padding: 70px;">

    <div class="card">
        <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Assigned To</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataProvider->getModels() as $index => $model): ?>
                        <tr>
                            <th scope="row"><?= $index + 1 ?></th>
                            <td><?= $model->id ?></td>
                            <td><?= $model->title ?></td>
                            <td><?= $model->description ?></td>
                            <td><?= $model->status == 1 ? 'Active' : 'Not Active' ?></td>
                            <td><?= Yii::$app->formatter->asDatetime($model->created_at) ?></td>
                            <td><?= Yii::$app->formatter->asDatetime($model->updated_at) ?></td>
                            <td><?= $model->assigne ? $model->assigne->username : null ?></td>
                            <td>
                                <?= Html::a('<i class="bi bi-eye"></i>', ['view', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= Html::a('<i class="bi bi-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-info btn-sm']) ?>
                                <?= Html::a('<i class="bi bi-trash"></i>', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger btn-sm',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
