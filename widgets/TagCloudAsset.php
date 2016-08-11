<?php

namespace dongrim\tagcloud\widgets;

use yii\web\AssetBundle;

class TagCloudAsset extends AssetBundle
{

    public $sourcePath = '@dongrim/tagcloud/widgets/assets';

    public $css = [
        'css/tagcloud.css',
    ];
    public $js = [
        'js/jquery.tagsphere.js',
        'js/jquery.mousewheel.min.js'
    ];

    public function init()
    {
        parent::init();
    }
}