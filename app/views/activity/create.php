<?php
    use yii\bootstrap\ActiveForm;

    var_dump('myName');
?>


<div class="row">
    <div class="col-md-6">
        <h2>Создание нового задания</h2>
        <?php $form=ActiveForm::begin([
                'action' => '',
                'method' => 'POST',
                'id' => 'activity',
                'options' => [
                        'enctype' => ''
                ]
        ]); ?>

        <?= $form->field($activity, 'title'); ?>
        <?= $form->field($activity, 'description') -> textarea(); ?>
        <?= $form->field($activity, 'date_start'); ?>
        <?= $form->field($activity, 'is_blocked') -> checkbox(); ?>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Отправить</button>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>