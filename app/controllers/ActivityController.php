<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 19.02.2019
 * Time: 21:33
 */

namespace app\controllers;

use app\base\BaseController;
use app\controllers\actions\ActivityCreateAction;
use app\models\Activity;
use yii\rest\DeleteAction;


class ActivityController extends BaseController
{
    public  function actions() {
        return [
            'create' => ['class' => ActivityCreateAction::class, 'myName' => 'Serge'],
            'confirm' => ['class' => ConfirmAction::class],
            'edit' => ['class' => ActivityCreateAction::class]
        ];
    }
}