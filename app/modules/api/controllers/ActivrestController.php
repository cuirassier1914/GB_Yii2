<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 16.03.2019
 * Time: 15:09
 */

namespace app\modules\api\controllers;


use app\models\Activity;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use app\models\Users;
use yii\filters\auth\HttpBearerAuth;

class ActivrestController extends ActiveController
{
    public $modelClass = Activity::class;

    //авторизация не работает - 'Call to a member function loginByAccessToken() on string' - ???
    public function behaviors()
    {
        return array_merge([
            'authentificator' => [
                //'class' => HttpBearerAuth::class,
                'class' => HttpBasicAuth::class,
                'user' => Users::class
            ],
        ], parent::behaviors());
    }
}