<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = 'Update Activity: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activity-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Yii::t('app', 'Date Start', [strtotime($model->date_start)]); ?></p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
