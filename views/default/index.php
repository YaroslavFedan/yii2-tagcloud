<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Search by tag').' : ' . $tag;
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag(['name' => 'title', 'content' => Html::encode($this->title)]);
$this->registerMetaTag(['name' => 'description', 'content' => Html::encode($this->title)]);
?>

<?php if (count($data) == 0): ?>

<?php else: ?>
    <?php foreach ($data as $item): ?>
        <?php if ($item['searchType'] == 'gallery'): ?>

            <div class="clearfix"></div>
            <hr/>
            <div class="col-xs-4">
                <div class="thumbnail">
                    <?= Html::img($item['image'], ['style' => 'width:100%']) ?>
                    <div class="caption">
                        <h4> <?= Html::a($item['title'], '/#') ?></h4>
                        <h5><?= $item['description'] . (!empty($item['description']) ? "<br>" : "") ?>
                            <small><?= $item['tags'] ?></small>
                        </h5>
                    </div>
                </div>

            </div>

        <?php endif; ?>

        <?php if ($item['searchType'] == 'post'): ?>

            <div class="row" style="margin-bottom: 30px;">
                <div class="col-xs-4">
                    <?php if ($item['image'] != null)
                        echo Html::img($item['image'], ['style' => 'width:100%']);
                    ?>
                </div>
                <div class="col-xs-8">
                    <h4><?= Html::a($item['title'],
                            Url::to(["#", "id" => $item['id'], "title" => $item['title']])) ?></h4>
                    <h5><?= Html::encode($item['author_id'] ? '' : "") ?>
                        <small><?= Html::encode(date('D d M, Y H:m:s', strtotime($item['time']))) ?></small>
                    </h5>
                    <p><?= Html::encode($item['description']) ?></p>
                    <p class="pull-right" style="padding-right: 15px;">
                        <?= Html::a(Yii::t('app', 'Read More'),
                            Url::to(["#", "id" => $item['id'], "title" => $item['title']]),
                            ['class' => 'btn btn-small btn-default']);
                        ?>
                    </p>
                </div>
            </div>

        <?php endif; ?>

    <?php endforeach; ?>
<?php endif; ?>
