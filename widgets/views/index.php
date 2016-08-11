<?php
use yii\helpers\Url;
?>
<h4><?= Yii::t("app","Tag Cloud")?></h4>
<div id="ts1" class="col-md-12" >
    <ul>
        <?php foreach ($model as $key=>$value):?>
        <li><a href="<?=Url::toRoute($link.$value['tags'])?>" rel="<?=$key?>" ><?=$value['tags']?></a></li>
        <?php endforeach;?>
    </ul>
</div>
<?php $this->beginBlock('TagCloud') ?>
    $(function(){
        $('#ts1').tagcloud({centrex:190, centrey:190, init_motion_x:10, init_motion_y:10});
    });
<?php $this->endBlock(); ?>
<?php
dongrim\tagcloud\widgets\TagCloudAsset::register($this);
$this->registerJs($this->blocks['TagCloud'], yii\web\View::POS_END);
?>
