<?php

namespace dongrim\tagcloud\controllers;

use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Default controller for the `dongrim\tagcloud` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionView($tag)
    {
        $result = [];

        foreach ($this->module->tags as $key => $value)
        {
            $data = $this->findByTag($value, $tag);

            $result = ArrayHelper::merge($result, $data);
        }

       return $this->render($this->module->customView,['data'=>$result,'tag'=>$tag]);
    }


    /**
     * @param $model
     * @param $tag
     * @return mixed
     */
    protected function findByTag($model, $tag)
    {

        $searchModel = new $model['model'];
        $data = $searchModel::find()
            ->where(['like', $model['attribute'], $tag])
            ->asArray()
            ->all();

        foreach ($data as $key=>$value)
        {
            if(!isset($model['type']))
                $model['type'] = 'default';
            $data[$key]['searchType'] = $model['type'];
        }

        return $data;
    }
}
