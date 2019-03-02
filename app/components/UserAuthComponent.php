<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02.03.2019
 * Time: 15:15
 */

namespace app\components;


use app\models\Users;
use yii\base\Component;

class UserAuthComponent extends Component
{

    /**
     * @param null $params
     * @return Users
     */
    public function getModel($params=null) {

        /** @var Users $model */
        $model = new Users();

        if ($params) {
            $model->load($params);
        }

        return $model;
    }

    public function createNewUser(&$model):bool {

        if (!$model->validate(['email', 'password', 'password_repeat'])) {
            return false;
        }

        $model->password_hash = $this->hashPassword($model->password);

        if ($model->save()) {
            return true;
        }




    }

    private function hashPassword($password) {
        return \Yii::$app->security->generatePasswordHash($password);
    }
}