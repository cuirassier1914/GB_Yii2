<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02.04.2019
 * Time: 20:51
 */

namespace app\controllers;


use app\components\UserAuthComponent;
use app\models\Users;
use yii\base\Controller;
use yii\helpers\ArrayHelper;

class SaveActController extends Controller
{
    public function actionSave()
    {
        /** @var Users $model */
        $model = \Yii::$container->get(Users::class);
        /** @var UserAuthComponent $comp */
        $comp = \Yii::$app->auth;

        $user = $model::find()->andWhere(['id' => \Yii::$app->session['__id']])->one();

        //$model->password_hash = $comp->hashPassword('1915');

        $model->name = 'Goshka';

        $model->save();

        //print_r(ArrayHelper::toArray($user));


    }
}