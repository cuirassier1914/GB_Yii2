<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 17.03.2019
 * Time: 17:51
 */

namespace app\components\notification;


use yii\mail\MailerInterface;

class NotificationService implements NotificationInterface
{

    /** @var MailerInterface*/
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /** @param $activities
     * @return \Generator
     */
    public function sendTodayNotification($activities)
    {
        foreach ($activities as $activity) {
            $result = $this->mailer->compose('notification', ['model' => $activity])
                ->setFrom('kirasirTest@yandex.ru')
                ->setTo([$activity->user->email])
                ->setSubject('События на сегодня')
                ->setReplyTo('kirasirTest@yandex.ru')
                ->attach(\Yii::getAlias('@app/web/images/72341551458286.jpg'))
                ->setCharset('utf8')
                ->send();
            yield ['result' => $result, 'email' => $activity->user->email];
        }
    }
}