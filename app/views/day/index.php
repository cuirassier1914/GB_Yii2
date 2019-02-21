<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 21.02.2019
 * Time: 20:05
 */
use yii\bootstrap\ActiveForm;
?>
<h1>День</h1>
<h3><?= $model -> attributeLabels()['date']; ?></h3>
<p>
    <?= $model -> attributeLabels()['today']['mday']; ?>
    <?= $model -> attributeLabels()['today']['month']; ?>
    <?= $model -> attributeLabels()['today']['year']; ?>
</p>
<p><?= $model -> attributeLabels()['is_weekend']; ?></p>

<?php if (isset($model -> attributeLabels()['activities'][0])): ?>
<h3>Активности</h3>
<?php else: ?>
<h3>Нет запланированных активностей</h3>
<?php endif; ?>

<?php /*$form=ActiveForm::begin([
    'action' => 'activity/create',
    'method' => 'POST',
    'id' => 'to_activity',
    'options' => [
        'enctype' => ''
    ]
]); */?><!--

<div class="button">
    <button type="submit" class="btn btn-default">Создать событие</button>
</div>

--><?php /*ActiveForm::end(); */?>

<div class="button">
    <button type="submit" class="btn btn-default"><a href="/activity/create">Создать событие</a></button>
</div>
