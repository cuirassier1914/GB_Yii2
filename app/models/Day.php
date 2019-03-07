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


    function rules() {
        return [
            ['date', 'date', 'format' => 'php: Y-m-d', 'message' => 'дата в неверном фррмате']
        ];
    }

    /*public function beforeValidate()
    {
        if (!empty($this->date)) {
            $this->date=\DateTime::createFromFormat()
        }

        return parent::beforeValidate();
    }*/

    public function attributeLabels()
    {


        return [

        ];
    }
}