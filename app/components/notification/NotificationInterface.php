<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 17.03.2019
 * Time: 17:49
 */

namespace app\components\notification;


use app\models\Activity;

interface NotificationInterface
{

    /** @param $activities
     * @return \Generator
     */

    public function sendTodayNotification($activities);
}