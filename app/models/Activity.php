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

class Activity extends Model
{
    public $title;
    public $description;
    public $date_start;
    public $is_blocked;
    public $email;

    /**@var UploadedFile */
    public $image;



    public function beforeValidate()
    {

            $this->loadFile();



        if (!empty($this->date_start)) {
            $this->date_start=\DateTime::createFromFormat('d.m.Y', $this->date_start);

            if ($this->date_start) {
                $this->date_start=$this->date_start->format('Y-m-d');
            }
        }

        return parent::beforeValidate();
    }


    function rules() {
        return [
            ['title', 'string', 'min' => 2, 'max' => 150],
            ['date_start', 'date', 'format' => 'php: Y-m-d'],
            ['description', 'string'],
            [['title', 'date_start'], 'required'],
            ['is_blocked', 'boolean'],
            ['email', 'email'],
            [['image'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4]
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


    public function loadFile() {
        /* @var UploadedFile Image **/
        $this->image = UploadedFile::getInstance($this, 'image');
    }
}