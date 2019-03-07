<?php

/*$t = '01.01.2019';
$t = \DateTime::createFromFormat('d.m.Y', $t);
$t = $t->format('Y-m-d');
var_dump($t);*/




    use yii\bootstrap\ActiveForm;

    var_dump($activity->confirmed);
?>


<div class="row">
    <div class="col-md-6">
        <h2>Создание нового задания</h2>

        <?php $form=ActiveForm::begin([
                'action' => '/activity/confirm',
                'method' => 'POST',
                'id' => 'activity',
        ]); ?>


        <?= $form->field($activity, 'title'); ?>
        <?= $form->field($activity, 'description') -> textarea(); ?>
        <?= $form->field($activity, 'date_start'); ?>
        <?= $form->field($activity, 'date_end'); ?>
        <?= $form->field($activity, 'is_blocked') -> checkbox(); ?>
        <?= $form->field($activity, 'is_repeat') -> checkbox(); ?>
        <?= $form->field($activity, 'email'); ?>
        <?= $form->field($activity, 'image') -> fileInput();?>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Создать</button>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <a href="/calender"><button>Календарь</button></a>
</div>