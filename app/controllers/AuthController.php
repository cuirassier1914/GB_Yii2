<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02.03.2019
 * Time: 15:12
 */

namespace app\controllers;


use app\base\BaseController;
use app\components\UserAuthComponent;
use yii\web\Controller;

class AuthController extends Controller
{
    /**
     * @return string
     */
    public function actionSignUp()
    {
        /** @var UserAuthComponent $comp */
        $comp = \Yii::$app->auth;

        $model = $comp->getModel(\Yii::$app->request->post());

        if (\Yii::$app->request->isPost) {

            if ($comp->createNewUser($model)) {
                \Yii::$app->session->addFlash('success', 'Пользователь успешно зарегистрирован с id '.$model->id);
            }

            return $this->redirect(['/auth/signin']);
        }

        return $this->render('signup', ['model' => $model]);
    }
}