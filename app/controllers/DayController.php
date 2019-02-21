<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 19.02.2019
 * Time: 23:45
 */

namespace app\controllers;


use app\base\BaseController;
use app\models\Day;

/*use app\controllers\actions\DayCreateAction;*/

class DayController extends BaseController
{
    public  function actionIndex() {
        $model = new Day();

        return $this->render('index', ['model' => $model]);
    }
}