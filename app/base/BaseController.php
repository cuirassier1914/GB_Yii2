<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 19.02.2019
 * Time: 21:38
 */

namespace app\base;

use yii\web\Controller;
use yii\web\HttpException;

class BaseController extends Controller
{
    /*public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            throw new HttpException(404, 'Нет доступа. Авторизуйтесь!');
        }

        return parent::beforeAction($action);
    }*/


}