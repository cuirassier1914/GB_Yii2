<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 19.02.2019
 * Time: 23:48
 */

namespace app\controllers\actions;

use app\models\Day;
use yii\base\Action;

class DayShowAction extends Action
{
    public function run() {

        if (\Yii::$app->request->isGet) {
            $day = \Yii::$app->day->getModel(\Yii::$app->request->get());
        } else {
            $day = \Yii::$app->day->getModel();
        }

        $activity = \Yii::$app->activity->getModel();

        return $this->controller->render('show', ['day' => $day, 'activity' => $activity]);
    }
}