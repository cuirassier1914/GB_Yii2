<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 19.02.2019
 * Time: 21:43
 * @var $activity app\models\Activity
 */

namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $date_start;
    public $is_blocked;

    function rules() {
        return [
          ['title', 'string', 'min' => 2, 'max' => 150],
          [['title', 'date_start'], 'required'],
          ['is_blocked', 'boolean']
        ];
    }

    function attributeLabels() {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
            'date_start' => 'Дата начала',
            'is_blocked' => 'Блокирующее'
        ];
    }
}