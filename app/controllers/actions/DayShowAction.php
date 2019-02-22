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

        $day = \Yii::$app->day->getModel();

        if (\Yii::$app->request->isPost) {
            $day = \Yii::$app->day->getModel(\Yii::$app->request->post);
            \Yii::$app->day->showDay($day);
            $day -> validate();
        } else {
            $day = \Yii::$app->day->getModel();
        }



        return $this->controller->render('show', ['day' => $day]);
    }
}