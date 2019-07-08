<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;

$this->title = 'Доска';
?>
<div class="site-index">
    <?php echo Breadcrumbs::widget([
        'itemTemplate' => "<li><i>{link}</i></li>\n",
        'homeLink' => ['label' => 'Доска', 'url' => ['site/index']],
        'links' => [
            ['label' => '#', 'template' => "<li><b>{link}</b></li>\n"],
        ],
    ]); ?>
    <div class="body-content">
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="row">
            <?php foreach ($models as $model): ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card">
                    <?php if($model->image): ?>
                        <img class="card-img-top" src="<?= $model->image?>
                    <?php endif; ?>
">
                    <div class="card-block">
                        <figure class="profile">
                            <?php if($model->image): ?>
                                <img class="profile-avatar" src="<?= $model->profile->image?>">
                            <?php endif; ?>
                        </figure>
                        <h4 class="card-title mt-3"><?=$model->header?></h4>
                        <div class="meta">
                            <p><i class="fas fa-tags text-primary"></i> <b>Цена: <?=$model->price?> Р</b></p>
                        </div>
                        <div class="card-text">
                        </div>
                    </div>
                    <div class="card-footer">
                        <small><?=$model->date_pub?></small>
                        <a><?= Html::a('Читать далее', ['site/post', 'id' => $model->id_doska], ['class' => 'btn btn-sm btn-outline btn-primary ']) ?></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?= LinkPager::widget([
            'pagination' => $pages,
        ]); ?>
    </div>
</div>
