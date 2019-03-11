<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 10.03.2019
 * Time: 17:18
 *
 * @var \app\models\Activity $model
 */

?>


<h2>События на сегодня</h2>
<string><?= $model->title; ?></string>
<p style="color: green;"><?= Yii::$app->viewFormatter->asDate($model->date_start); ?></p>