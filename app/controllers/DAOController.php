<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02.03.2019
 * Time: 1:06
 */

namespace app\controllers;


use app\base\BaseController;
use app\components\DAOComponent;

class DAOController extends BaseController
{
    public  function actionIndex() {

        $modelo = new DAOComponent();

        return $this->render('index', ['model' => $model]);
    }
}