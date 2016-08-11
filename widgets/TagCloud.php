<?php

namespace dongrim\tagcloud\widgets;

use Yii;
use yii\base\ExitException;
use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;


class TagCloud extends Widget
{

    /**
     * @var array
     */
    public $tags = [];

    /**
     * @return string
     */
    public function run()
    {
        $module = Yii::$app->getModule('tagcloud');

        if(count($module->tags) > 0){
            $this->tags = $module->tags;

            $result = $this->getTags();
            $result = $this->uniqueMultidimArray($result, 'tags');

            $this->registerAssets();

            return $this->render($module->customWidgetView,
                ['model'=>$result,'link'=>$module->customLink]);

        }else{
            return null;
        }
    }


    /**
     * @return array
     * @throws NotFoundHttpException
     */
    private function getTags()
    {
            $result = [];

        foreach ($this->tags as $key => $tag)
        {
            try {
                $tag['model'];
                $tag['attribute'];
            } catch(ExitException $e){
                throw new NotFoundHttpException('The requested page does not exist.');
            }

            $model = new $tag['model'];

            $data = $model::find()
                ->select($tag['attribute'].' tags')
                ->where(['is not', $tag['attribute'] , null])
                ->andWhere( $tag['attribute'].' != :tags',[ ':tags' =>'' ])
                ->distinct($tag['attribute'])
                ->asArray()
                ->all();

            $result = ArrayHelper::merge($result, $data);
        }

        return $result;
    }


    /**
     * @param $array
     * @param $key
     * @return array
     *
     * возвращает уникальные имена тегов
     */
    protected function uniqueMultidimArray($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }


    private function registerAssets()
    {
        $view = $this->getView();
        TagCloudAsset::register($view);
    }
}