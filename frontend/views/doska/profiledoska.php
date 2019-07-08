<?php

use \yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;

$this->title = 'Мои объявления';
?>

<div class="container">
    <?php echo Breadcrumbs::widget([
        'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
        'homeLink' => ['label' => 'Доска', 'url' => ['site/index']],
        'links' => [
            ['label' => 'Мои объявления', 'template' => "<li><b>{link}</b></li>\n"],
        ],
    ]); ?>
    <?php foreach ($models as $one): ?>
        <div class="row">
            <div class="col-lg-7">

                <h1><?= $one->header; ?> <?= Html::a('', ['/doska/updatedoska', 'id' => $one->id_doska], ['class' => 'fas fa-pen']) ?> </h1>
                <h4><i class="fas text-info fa-unlock"></i> <?=$one->status?></h4>
                <p><?= '<b>Дата размещения: </b>' .$one->date_pub. '<b style="margin-left: 15px;">Категория: </b>' .$one->category. '<b style="margin-left: 15px;">Город: </b>' .$one->profile->city; ?></p>
                <h3>Описание</h3>
                <p><?= $one->about; ?></p>
            </div>
            <div class="col-lg-5">
                <img src="<?= $one->image; ?>" style="width: 200px;">
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
    <?= LinkPager::widget([
        'pagination' => $pages,
    ]); ?>
</div>