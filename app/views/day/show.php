<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 21.02.2019
 * Time: 20:05
 */


use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


?>

<h1>День</h1>

<h3><?= $day -> date; ?></h3>

<!--<h3><?/*= $day->date_title; */?></h3>
<p><?/*= $day->is_weekend; */?></p>-->

<div class="col-md-12">
    <?= \app\widgets\ActivitySearchWidget\ActivitySearchWidget::widget(['date_start' => $day -> date]); ?>
</div>




<?php $form=ActiveForm::begin([
    'action' => '/activity/create',
    'method' => 'POST',
    'id' => 'activity',
]); ?>

<?= $form->field($activity, 'date_start') -> label(false) -> hiddenInput(['value' => Html::encode($day->date)]); ?>

<div class="form-group">
    <button type="submit" class="btn btn-default">Создать задание</button>
</div>

<?php ActiveForm::end(); ?>

<!--<a href="\activity\create?date_start=<?/*= $day->date; */?>"><button>Создать активность</button></a>-->
<a href="/calender"><button>Календарь</button></a>
