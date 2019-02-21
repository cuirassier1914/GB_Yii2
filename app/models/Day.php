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


    public function attributeLabels()
    {
        $today = getdate();

        $is_weekend = ($today['wday'] == 0 || $today['wday'] == 6) ? 'выходной' : 'рабочий';

        $activities = [];

        return [
            'today' => $today,
          'date' => 'Дата',
          'is_weekend' => $is_weekend,
          'activities' => $activities
        ];
    }
}