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
use app\models\Day;

class CalenderController extends BaseController
{
    public  function actionIndex() {

        $model = new Calender();
        $day = new Day();

        return $this->render('index', ['model' => $model, 'day' => $day]);
    }
}