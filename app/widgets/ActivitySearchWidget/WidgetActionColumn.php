<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 10.03.2019
 * Time: 14:37
 */

namespace app\widgets\ActivitySearchWidget;


use yii\grid\ActionColumn;
use yii\helpers\Url;

class WidgetActionColumn extends ActionColumn
{
    public function createUrl($action, $model, $key, $index)
    {
        if (is_callable($this->urlCreator)) {
            return call_user_func($this->urlCreator, $action, $model, $key, $index, $this);
        }

        $params = is_array($key) ? $key : ['id' => (string) $key];
        $params[0] = 'activity-search' . '/' . $action;

        return URL::toRoute($params);
    }
}