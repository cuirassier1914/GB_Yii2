<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 03.03.2019
 * Time: 0:51
 */

namespace app\controllers;


use yii\web\Controller;

class RbacController extends Controller
{
    public function actionGen() {
        \Yii::$app->rbac->generateRbacRules();
    }
}