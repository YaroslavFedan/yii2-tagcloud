<?php

namespace dongrim\tagcloud;
/**
 * cloud module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'dongrim\tagcloud\controllers';

     public $customWidgetView = '@dongrim/tagcloud/widgets/views/index';

    public $customView = 'index';

    public $customLink = '/tagcloud/default/view/?tag=';

    public $tags = [];
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
}
