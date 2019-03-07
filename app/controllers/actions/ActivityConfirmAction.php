<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 05.03.2019
 * Time: 21:46
 */

namespace app\controllers\actions;


use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;

class ActivityConfirmAction extends Action
{
    public function run() {

        /** @var ActivityComponent $comp */
        $comp = \Yii::$app->activity;

            $activity = $comp->getModel(\Yii::$app->request->post());

            //if ($comp->createActivity($activity)) {

                if ($activity->confirmed) {

                    $day = \Yii::$app->day->getModel();

                    $comp->createActivity($activity);

                    return $this->controller->render('../day/show', ['day' => $day, 'activity' => $activity]);
                }

                return $this->controller->render('create-confirm', ['activity' => $activity]);
            //}

    }
}