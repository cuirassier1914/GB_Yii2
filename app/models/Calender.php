<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 22.02.2019
 * Time: 23:43
 */

namespace app\models;


use yii\base\Model;

class Calender extends Model
{
    public $today;

    public function getToday(){
        $this -> today = getdate();

        return $this -> today;
    }

    public  function getMonths() {
        $year = (int)$this ->getToday()['year'];
        $months = [];

        for($i=1; $i < 13; $i++ ){
            $number = cal_days_in_month(CAL_GREGORIAN, $i, $year);
            $months[] = $number;
        }

        return $months;
    }
}