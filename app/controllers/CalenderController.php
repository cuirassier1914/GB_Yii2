<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 22.02.2019
 * Time: 23:34
 */

namespace app\controllers;

use app\models\Calender;
use app\base\BaseController;

class CalenderController extends BaseController
{
    public  function actionIndex() {

        $model = new Calender();

        return $this->render('index', ['model' => $model]);
    }
}