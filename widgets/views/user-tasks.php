<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .card {
        box-shadow: 0 0 15px rgb(0, 0, 0, 0.4);
    }
    .card-header {
        background-color: #333333;
        color: white; 
    }
</style>
<div class="card">
    <div class="card-header">
        Your Tasks
    </div>
    <div id="task-widget" class="tasks-container draggable-widget">
        <ul id="task-list" class="list-group list-group-flush">
            <?php foreach ($tasks as $task): ?>
                <li id="task-<?= $task->id ?>" class="list-group-item draggable-task">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="task-handle">
                            <i class="bi bi-chevron-bar-expand"></i>
                        </div>
                        <div class="task-details">
                            <h5 class="mb-1"><?= $task->title ?></h5>
                            <small><?= Yii::$app->formatter->asDate($task->created_at, 'php:d M Y') ?></small>
                            <p class="mb-1"><?= $task->description ?></p>
                        </div>
                        <small style="margin-left: -70px;" class="<?= $task->status == 1 ? 'text-success' : 'text-danger' ?>">
                            <?= $task->status == 1 ? 'Active' : 'Not Active' ?>
                        </small>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<!-- jQuery and jQuery UI -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
    // Make task list sortable
    $("#task-list").sortable({
        handle: '.task-handle',
        axis: "y",
        containment: "parent",
        cursor: "move",
        opacity: 0.7,
        update: function(event, ui) {
            // Update the order of tasks
            var taskIds = [];
            $("#task-list .draggable-task").each(function() {
                taskIds.push($(this).attr("id").replace('task-', ''));
            });

            // Send an AJAX request to update the task order
            $.ajax({
                url: '<?= Url::to(['task/update-order']) ?>',
                method: 'POST',
                headers: {'X-CSRF-Token': '<?= Yii::$app->request->getCsrfToken() ?>'},
                data: { taskIds: taskIds },
                success: function(response) {
                    if (response === 'success') {
                        console.log('Task order updated successfully.');
                    } else {
                        console.log('Failed to update task order.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                    console.log('Server response:', xhr.responseText);
                }
            });
        }
    });
});


</script>
