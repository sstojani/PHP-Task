<?php

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>

<div class="card" style="width: 400px; margin: 0 auto;">
    <div class="card-header" style="background-color: lightseagreen; color: white;">
        <?= Html::encode($this->title) ?>
    </div>
    <div class="card-body">
        <p>
            This is the About page. You may modify the following file to customize its content:
        </p>
        <code><?= __FILE__ ?></code>
    </div>
</div>
