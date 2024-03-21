<?php
use yii\helpers\Html;

echo '<div class="task-item">';
echo '<h4>' . Html::encode($model->title) . '</h4>';
echo '<p>' . Html::encode($model->description) . '</p>';
echo '</div>';
