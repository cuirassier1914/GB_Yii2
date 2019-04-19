<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 19.04.2019
 * Time: 22:55
 */

namespace app\assets;


use yii\web\AssetBundle;

class CalenderAsset extends AssetBundle
{
    public $sourcePath = '@app/views/calender';

    public $css = [
        'css/calender.css',
    ];
    public $js = [
        'js/calenderScript.js',
    ];
    public $depends = [
        '\app\assets\AppAsset',
    ];
}