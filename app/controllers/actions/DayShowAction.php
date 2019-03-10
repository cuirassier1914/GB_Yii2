<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 19.02.2019
 * Time: 23:48
 */

namespace app\controllers\actions;

use app\controllers\ActivitySearchController;
use app\models\Day;
use app\models\Users;
use yii\base\Action;

class DayShowAction extends Action
{
    public function run() {

        $comp = \Yii::$app->day;

        if (\Yii::$app->request->isPost) {
            $day = $comp->getModel(\Yii::$app->request->post());
        } else {
            $day = $comp->getModel();
        }

        $activity = \Yii::$app->activity->getModel();


        return $this->controller->render('show', ['day' => $day, 'activity' => $activity]);
    }
}