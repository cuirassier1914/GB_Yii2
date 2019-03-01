<?php
use yii\bootstrap\ActiveForm;
?>



<div class="row">
    <?php print_r($model->getAllUsers()); ?>
    <?php print_r($model->getUsersActivities(1)); ?>
    <?php print_r($model->getFirstActivity()); ?>
    <?php print_r($model->countNotificatedActivities()); ?>
    <?php print_r($model->getAllActivitiesOfUser(2)); ?>
</div>
