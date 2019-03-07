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
use yii\web\UploadedFile;

class Activity extends ActivityBase
{
    /*public $title;
    public $description;
    public $date_start;
    public $date_end;
    public $is_blocked;
    public $is_repeat;*/

    public $email;

    /**@var UploadedFile */
    public $image;

    public $confirmed;



    public function beforeValidate()
    {

        $this->loadFile();


        if (!empty($this->date_start)) {
            $this->date_start=\DateTime::createFromFormat('d.m.Y', $this->date_start);

            $dateAfterCreateFrom = $this->date_start;


            if ($this->date_start) {
                $this->date_start=$this->date_start->format('Y-m-d');

                $dateAfterFormate = $this->date_start;
            }
        }

        if(!empty($this->date_end)){
            $this->date_end=\DateTime::createFromFormat('d.m.Y', $this->date_end);
            if($this->date_end){
                $this->date_end=$this->date_end->format('Y-m-d');
            }
        }

        if(empty($this->date_end) || $this->date_end < $this->date_start) {
            $this->date_end = $this->date_start;
        }


        //Запись в лог
        $post = \Yii::$app->request->post();

        $messageLog = [
            'status' => 'Создание активности',
            'post' => $post,
            'dateAfterCreateFrom' => $dateAfterCreateFrom,
            'dateAfterFormate' => $dateAfterFormate
        ];

        \Yii::info($messageLog, 'activity_create');



        return parent::beforeValidate();
    }


    function rules() {
        return array_merge([
            ['user_id', 'default', 'value' => \Yii::$app->session->get('__id')],
            ['title', 'string', 'min' => 2, 'max' => 150],
            ['date_start', 'date', 'format' => 'php: Y-m-d'],
            ['date_end', 'date', 'format' => 'php: Y-m-d'],
            ['description', 'string'],
            [['title', 'date_start'], 'required'],
            ['is_blocked', 'boolean'],
            ['is_repeat', 'boolean'],
            ['confirmed', 'boolean'],
            ['email', 'email'],
            [['image'], 'file', 'extensions' => 'png, jpg'/*, 'maxFiles' => 4*/]
        ], parent::rules());
    }

    /*function attributeLabels() {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'is_blocked' => 'Блокирующее',
            'is_repeat' => 'Повторяющееся'
        ];
    }*/


    public function loadFile() {
        /* @var UploadedFile Image **/
        $this->image = UploadedFile::getInstance($this, 'image');
    }
}