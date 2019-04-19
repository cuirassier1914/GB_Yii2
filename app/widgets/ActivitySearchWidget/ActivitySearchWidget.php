<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 09.03.2019
 * Time: 23:22
 */

namespace app\widgets\ActivitySearchWidget;

use app\models\ActivitySearch;
use yii\bootstrap\Widget;

class ActivitySearchWidget extends Widget
{
    public $activities;
    public $date_start;

    public function run()
    {

        $searchModel = \Yii::$container->get(ActivitySearch::class);


        $dataProvider = $searchModel->search([], ['date_start' => $this->date_start]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}