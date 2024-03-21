<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\User $model */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: lightseagreen; color: white;"><?= Html::encode($this->title) ?></div>
                <div class="card-body">
                    <p>Please fill out the following fields to register:</p>

                    <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Register', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <div style="color:#999;">
                        Already have an account? <a href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>"><strong>Login</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
