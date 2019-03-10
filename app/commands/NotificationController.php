<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 10.03.2019
 * Time: 16:00
 */

namespace app\commands;


use yii\helpers\Console;
use yii\console\Controller;

class NotificationController extends Controller
{

    public $param;

    function options($actionID)
    {
        return ['param'];
    }

    function optionAliases()
    {
        return ['p' => 'param'];
    }

    public function actionParam() {
        echo 'param '.$this->param.PHP_EOL;
    }

    public function actionIndex(...$args){
        echo $this->ansiFormat('this is console'.PHP_EOL, Console::FG_YELLOW);
        echo 'param '.print_r($args).PHP_EOL;
    }

}