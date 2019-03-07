<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02.03.2019
 * Time: 15:26
 */
use yii\bootstrap\ActiveForm;

?>
<h1>Регистрация нового пользователя</h1>
<div class="row">
    <div class="col-md-6">
        <?php $form=ActiveForm::begin([
            'method' => 'POST'
        ]); ?>

        <?= $form->field($model, 'email'); ?>
        <?= $form->field($model, 'password')->passwordInput(); ?>
        <?= $form->field($model, 'password_repeat')->passwordInput(); ?>

        <div class="form-group">
            <button type="submit">Регистрация</button>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
