<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 22.02.2019
 * Time: 21:25
 */

namespace app\components;

use app\models\Day;
use yii\base\Component;

class DayComponent extends Component
{
    /**@var string class of day entity*/

    public $day_class;

    /**@return Day*/



    public function getModel($params=null) {
        $model = new $this -> day_class;

        if ($params && is_array($params)) {
            $model -> load($params);
        }

        $today = getdate();
        $model -> date = $today['mday'] . ' ' . $today['month'] . ' ' . $today['year'];
        $model -> is_weekend = ($today['wday'] == 0 || $today['wday'] == 6) ? 'выходной' : 'рабочий';
        $model -> activities = [];


        return $model;
    }

    public function showDay(&$model):bool{
        return $model -> validate();
    }
}