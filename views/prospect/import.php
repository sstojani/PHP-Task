<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Import CSV';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="prospect-import" style="display: flex; justify-content: center; align-items: center; height: 70vh;">
    <div class="card" style="width: 400px;">
        <div class="card-header" style="background-color: lightseagreen; color: white;">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'csvFile')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Import', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<script>
    <?php
$js = <<<JS
setTimeout(function() {
    $('.alert').fadeOut('fast');
}, 3000);
JS;
$this->registerJs($js);
?>
</script>