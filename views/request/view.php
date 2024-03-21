<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Request $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<br>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: lightseagreen; color: white;">
                    <h8>Request ID = <?= Html::encode($this->title) ?></h8>
                </div>
                <div class="card-body">
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
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
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
