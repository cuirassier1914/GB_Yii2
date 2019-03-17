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
use yii\helpers\Html;

?>

<h1>Смена пароля</h1>
<div class="row">
    <div class="col-md-6">
        <?php $form=ActiveForm::begin([
            'method' => 'POST'
        ]); ?>

        <?= $form->field($model,'password')->passwordInput(); ?>

        <?= $form->field($model, 'new_password')->passwordInput(); ?>
        <?= $form->field($model, 'new_password_repeat')->passwordInput(); ?>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Сменить пароль</button>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>