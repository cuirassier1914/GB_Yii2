<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 19.02.2019
 * Time: 22:56
 */

namespace app\components;

use app\models\Activity;
use yii\base\Component;
use yii\helpers\FileHelper;

class ActivityComponent extends Component
{
    /**@var string class of activity entity*/

    public $activity_class;

    /**@return Activity*/

    public function getModel($params=null) {
        $model = new $this -> activity_class;


        if ($params && is_array($params)) {
            $model -> load($params);
        }

        if (isset($params['date_start'])) {
            $model->date_start = $params['date_start'];
        }


        return $model;
    }

    /** @param $model Activity */

    public function createActivity(&$model){
        if($model -> validate()) {

//            print_r($model->getAttributes());exit;
            if ($model->image) {
                $path = $this->getPathSaveFile();
                $name = mt_rand(0, 9999).time().'.'.$model->image->getExtension();

//                echo 'ok';exit;
                if (!$model->image->saveAs($path.$name)) {
                    $model->addError('image', 'не удалось загрузить файл');
                    return false;
                }

                $model->image=$name;
            }

            return true;
        }
        return false;
    }

    private function getPathSaveFile() {
        FileHelper::createDirectory(\Yii::getAlias('@app/web/images'));
        return \Yii::getAlias('@app/web/images/');
    }

}