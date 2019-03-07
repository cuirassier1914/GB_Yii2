<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02.03.2019
 * Time: 1:06
 */

namespace app\controllers;


use app\base\BaseController;
use app\components\DaoComponent;

class DaoController extends BaseController
{
    public  function actionIndex() {

        $model = new DaoComponent();

        return $this->render('index', ['model' => $model]);
    }
}