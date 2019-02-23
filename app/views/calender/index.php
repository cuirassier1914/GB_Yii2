<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 22.02.2019
 * Time: 23:40
 */



use yii\bootstrap\ActiveForm;

?>
<h1><?= $model -> getToday()['year'] ?></h1>

<?php foreach($model -> getMonths() as $month): ?>
<div class="month">
<?php for($i = 1; $i <= $month; $i++): ?>
    <!--<a href="#"><?/*= $i */?></a>-->

    <?php $form=ActiveForm::begin([
        'action' => '',
        'method' => 'POST',
        'id' => 'day',
        'options' => [
            'enctype' => ''
        ]
    ]); ?>

    <button type="submit" class="btn btn-default"><?= $i ?></button>

    <?php ActiveForm::end(); ?>

<?php endfor; ?>
</div>
<?php endforeach; ?>
