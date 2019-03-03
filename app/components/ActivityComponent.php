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

            /*if (!isset($params['date_end'])) {
                $model->date_end = $params['date_start'];
            }*/
        }




        return $model;
    }

    /** @param $model Activity */

    public function createActivity(&$model){
        if($model -> validate()) {

            if ($model->image) {
                $path = $this->getPathSaveFile();
                $name = mt_rand(0, 9999).time().'.'.$model->image->getExtension();


                if (!$model->image->saveAs($path.$name)) {
                    $model->addError('image', 'не удалось загрузить файл');
                    return false;
                }

                $model->image=$name;

                //сохранение в БД

            }

            $model->save();

            return true;
        }
    }

    private function getPathSaveFile() {
        FileHelper::createDirectory(\Yii::getAlias('@app/web/images'));
        return \Yii::getAlias('@app/web/images/');
    }

    public function getActivity($id) {
        return $this->getModel()::find()->andWhere(['id' => $id])->one();
    }

}