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

        return $model;
    }

    public function createActivity(&$model):bool{
        return $model -> validate();
    }
}