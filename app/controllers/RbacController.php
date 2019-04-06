<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 03.03.2019
 * Time: 0:51
 */

namespace app\controllers;


use app\base\BaseController;
//use yii\web\Controller;

class RbacController extends BaseController
{
    public function actionGen() {
        \Yii::$app->rbac->generateRbacRules();
    }
}