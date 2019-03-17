<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02.03.2019
 * Time: 15:15
 */

namespace app\components;


use app\models\Users;
use mysql_xdevapi\Session;
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
        $model->token = $this->hashPassword(random_int(0,9999));

        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $model->save();
            \Yii::$app->rbac->addRole($model->id);

            $transaction->commit();

            return true;
        }
        catch (\Throwable $e) {
            $transaction->rollBack();
        }

        /*if ($model->save()) {

            \Yii::$app->rbac->addRole($model->id);

            return true;
        }*/

    }

    private function hashPassword($password) {
        return \Yii::$app->security->generatePasswordHash($password);
    }

    public function loginUser(&$model):bool {

        $user = $this->getUserByEmail($model->email);

        if (!$user) {
            $model->addError('email', 'Пользователь с email '.$model->email.' не зарегистрирован');
            return false;
        }

        if (!$this->validatePassword($model->password, $user->password_hash)) {
            $model->addError('password', 'Неверный пароль!');
            return false;
        }

        $user->username = $user->email;

        return \Yii::$app->user->login($user);

    }



    public function changeUserPassword(&$model):bool
    {

//?
        $user = $this->getModel()::find()->andWhere(['id' => \Yii::$app->session['__id']])->one();

        if (!$this->validatePassword($model->password, $user->password_hash)) {
            $model->addError('password', 'Неверный пароль!');
            return false;
        }

        if (!$model->validate(['new_password', 'new_password_repeat'])) {
            return false;
        }

        $model->password_hash = $this->hashPassword($model->new_password);

        $model->save();

        return true;


        /*$transaction = \Yii::$app->db->beginTransaction();
        try {

            //проверить, save или update
            $model->updateAttributes(['password_hash' => $model->password_hash]);

            $transaction->commit();

            return true;
        }
        catch (\Throwable $e) {
            $transaction->rollBack();
        }*/
    }

    public function getUserByEmail($email) {
        return $this->getModel()::find()->andWhere(['email' => $email])->one();
    }

    public function validatePassword($password, $hash) {
        return \Yii::$app->security->validatePassword($password, $hash);
    }

}