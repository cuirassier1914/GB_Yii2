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
        } else {
            $params = [
              'year' => 2019,
              'month' => 2,
              'day' => 24
            ];
            $model -> load($params);
        }

        $year = (int)$params['year'];
        $month = (int)$params['month'];
        $day = (int)$params['day'];

        $model -> date = $day.'.'.$month.'.'.$year;


        $dayOfWeek = date("N", mktime(0, 0, 0, $month, $day, $year));

        $model -> date_title = $day . ' ' . date("F", mktime(0, 0, 0, $month, $day, $year)) . ' ' . $year;
        $model -> is_weekend = ($dayOfWeek == 6 || $dayOfWeek == 7) ? 'выходной' : 'рабочий';
        $model -> activities = [];


        return $model;
    }

    public function showDay(&$model):bool{
        return $model -> validate();
    }
}