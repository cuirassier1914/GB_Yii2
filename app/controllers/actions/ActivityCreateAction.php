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
use yii\web\HttpException;

class ActivityCreateAction extends Action
{

    public $myName;

    public function run() {

        if (!\Yii::$app->rbac->canCreateActivity()) {
            throw new HttpException(403, 'Нет прав на создание активности. Авторизуйтесь!');
        }


        $comp = \Yii::$app->activity;

        if (\Yii::$app->request->isPost) {
            $activity = $comp->getModel(\Yii::$app->request->post());

            /*if ($comp->createActivity($activity)) {
                return $this->controller->render('create-confirm', ['activity' => $activity]);
            }*/


        } else {

            $activity = \Yii::$app->activity->getModel();

            //Теперь дата дня для подстановки передается через POST
            /*if (\Yii::$app->request->isGet) {
                $activity = \Yii::$app->activity->getModel(\Yii::$app->request->get());
            }*/

        }

        return $this->controller->render('create', ['activity' => $activity]);


    }
}