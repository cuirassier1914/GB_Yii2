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

<?php $month = 1; ?>
<?php foreach($model -> getMonths() as $item): ?>

<div class="month">
    <h3><?= $model -> monthsNames[$month - 1] ?></h3>
<?php for($i = 1; $i <= $item; $i++): ?>
    <!--<a href="day/show?day=<?/*= $i */?>&month=<?/*= $month */?>&year=<?/*= $model -> getToday()['year'] */?>">
        <button type="submit"><?/*= $i */?></button>
    </a>-->

    <?php $form=ActiveForm::begin([
        'action' => '/day/show',
        'method' => 'POST',
        'id' => 'activity',
    ]); ?>

    <?= $form->field($day, 'date') -> label(false) -> hiddenInput(['value' =>
        \Yii::$app->sqlFormatter->asDate($model -> getToday()['year'].'-'.$month.'-'.$i)]); ?>

    <div class="form-group">
        <button type="submit" class="btn btn-default"><?= $i ?></button>
    </div>

    <?php ActiveForm::end(); ?>

<?php endfor; ?>
</div>
<?php $month += 1; ?>
<?php endforeach; ?>
