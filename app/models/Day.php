<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 21.02.2019
 * Time: 20:11
 */

namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $today;
    public $calender;
    public $date;
    public $is_weekend;
    public $activities;


    function rules() {
        return [
            ['date', 'date', 'format' => 'php: Y-m-d']
        ];
    }

    public function attributeLabels()
    {


        return [

        ];
    }
}