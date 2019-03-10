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
    public $date;
    public $date_title;
    public $is_weekend;
    public $activities;

    public $user_id;


    function rules() {
        return [
            ['date', 'date', 'format' => 'php: Y-m-d', 'message' => 'дата в неверном фррмате']
        ];
    }


    public function attributeLabels()
    {


        return [

        ];
    }
}