<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\task $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-form" style="padding: 70px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        1 => 'Active',
        0 => 'Not Active',
    ], ['prompt' => 'Select Status']) ?>
    
    <?= $form->field($model, 'assigned_to')->dropDownList(
    ArrayHelper::map(User::find()->all(), 'id', 'username'),
    ['prompt' => 'Select User']) 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
