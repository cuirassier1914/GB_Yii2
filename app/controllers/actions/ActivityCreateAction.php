<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 19.02.2019
 * Time: 22:22
 */

namespace app\controllers\actions;

use app\models\Activity;
use yii\base\Action;

class ActivityCreateAction extends Action
{

    public $myName;

    public function run() {
        $comp = \Yii::$app->activity;

        if (\Yii::$app->request->isPost) {
            $activity = $comp->getModel(\Yii::$app->request->post());

            if ($comp->createActivity($activity)) {
                return $this->controller->render('create-confirm', ['activity' => $activity]);
            }


        } else {

            if (\Yii::$app->request->isGet) {
                $activity = \Yii::$app->activity->getModel(\Yii::$app->request->get());
                return $this->controller->render('create', ['activity' => $activity]);
            }

            $activity = \Yii::$app->activity->getModel();

        }

        return $this->controller->render('create', ['activity' => $activity]);


    }
}