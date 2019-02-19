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
        $activity = \Yii::$app->activity->getModel();

        if (\Yii::$app->request->isPost) {
            $activity = \Yii::$app->activity->getModel(\Yii::$app->request->post);
            \Yii::$app->activity->createActivity($activity);
            $activity -> validate();
        } else {
            $activity = \Yii::$app->activity->getModel();
        }



        return $this->controller->render('create', ['activity' => $activity]);
    }
}