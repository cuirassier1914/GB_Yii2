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

    public $email;

    /**@var UploadedFile */
    public $image;

    public $confirmed;


    public function beforeValidate()
    {

        $this->loadFile();

        if (!empty($this->date_start)) {
            $this->date_start=\Yii::$app->sqlFormatter->asDate($this->date_start);
        }

        if(!empty($this->date_end)){
            $this->date_end=\Yii::$app->sqlFormatter->asDate($this->date_end);

        }

        if(empty($this->date_end) || $this->date_end < $this->date_start) {
            $this->date_end = $this->date_start;
        }

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

    public function findByDay($date_start) {
        return parent::find()->andWhere(['date_start', $date_start]);
    }


    //То, что выдается для REST api
    public function fields()
    {
        return [
            'id', 'title', 'description',
            'user_email' => function($model){
                return $model->user->email;
            }
        ];
    }

    //То, что выдается для REST api по дополнительному запросу
    public function extraFields()
    {
        return [
            'date_start', 'date_end',
            'user_notification' => function($model){
                return $model->user_notification?'Oui':'Non';
            },
            'is_repeat' => function($model){
                return $model->is_repeat?'Oui':'Non';
            },
            'is_blocked' => function($model){
                return $model->is_blocked?'Oui':'Non';
            },
        ];
    }
}