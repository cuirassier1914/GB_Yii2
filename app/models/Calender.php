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
}