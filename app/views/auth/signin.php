<?php

/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02.03.2019
 * Time: 23:52
 */

/* @var $this \yii\web\View */
/* @var $model \app\models\Users */

use yii\bootstrap\ActiveForm;

?>

<h1>Авторизация</h1>
<div class="row">
    <div class="col-md-6">
        <?php $form=ActiveForm::begin([
            'method' => 'POST'
        ]); ?>

        <?= $form->field($model, 'email'); ?>
        <?= $form->field($model, 'password')->passwordInput(); ?>

        <div class="form-group">
            <button type="submit">Войти</button>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
