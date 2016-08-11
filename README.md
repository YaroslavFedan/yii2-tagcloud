Установка
------------

####Download:

Download from [Github](https://github.com/YaroslavFedan/yii2-multilanguage).

**Composer**
```
composer require dongrim/yii2-tagcloud
```


Подключение модуля
------------

В блок components конфигурационного файла config/web.php добавляем:

```
'tagcloud' => [
    'class' => 'dongrim\tagcloud\Module',
    'tags'=>[
        [
            'model'=>'app\models\Post', 
            'attribute'=>'tags',  
            'type'=>'post' 
        ],
        [
            'model'=>'app\models\Gallery',
            'attribute'=>'tags',
            'type'=>'gallery'
        ],
       ...
    ],
//  'customView' =>'',
//  'customLink' =>''
],
```
**Параметры**
```
model - указатель на модель
attribute - поле в таблице
type - (не обязательный параметр)  разделение по типу во view результатов поиска
customView - (не обязательный параметр) путь к view для отображения облака
customLink - (не обязательный параметр) ссылка на контроллер  - обработчик поиска
```

Использование
--------

```
use dongrim\tagcloud\widgets\TagCloud;
<?=TagCloud::widget()?>
```

