<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Request $model */

$this->title = 'Create Request';
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-create">
<br>
<br>
<br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<script>
    <?php
$js = <<<JS
setTimeout(function() {
    $('.alert').fadeOut('fast');
}, 3000); // Time in milliseconds
JS;
$this->registerJs($js);
?>
</script>
