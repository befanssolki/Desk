<?php

use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */

$this->title = 'Пост' . ' ' . $model->header;
?>
<div class="site-index">
    <?php echo Breadcrumbs::widget([
        'itemTemplate' => "<li><i>{link}</i></li>\n",
        'homeLink' => ['label' => 'Доска', 'url' => ['site/index']],
        'links' => [
            ['label' => 'Объявление - '.$model->header, 'template' => "<li><b>{link}</b></li>\n"],
        ],
    ]); ?>
    <div class="body-content">
    <div class="jumbotron col-md-6">
        <p><img class="img-responsive" src="<?= $model->image; ?>" style="width: 300px; border-radius: 15px"></p>
        <div class="text-left">
        <h1><?=$model->header?></h1>
        <p><i class="fas text-primary fa-tags"></i> <b>Цена: <?=$model->price?> Р</b></p>
            <p><b>Категория:</b> <h7 class="badge"></b><?=$model->category?></h7></p>
            <p><b>Город: </b><?=$model->profile->city?></p>
            <p><b>Дата публикации: </b><?=$model->date_pub?></p>
        <p><b>Описание: </b><?=$model->about?></p>
        <p><a class="btn btn-primary" href="#" role="button">Купить</a></p>
        </div>
    </div>
        <div class="jumbotron col-md-6">
            <h1><?php if($model->image): ?>
                    <img src="<?= $model->profile->image?>" alt="" style="width: 500px; border-radius: 15px;">
                <?php endif; ?></h1>
        <p><b>Автор публикации: </b><?= $model->profile->name_profile . ' ' . $model->profile->familia_profile . ' ' . $model->profile->otchestvo_profile ?></p>
            <p><b>На сайте с: </b><?=$model->profile->datereg?></p>
            <p><b>Телефон: </b><?=$model->profile->tel?></p>
            <p><b>О себе: </b><?=$model->profile->about_profile?></p>
        </div>
    </div>

</div>
