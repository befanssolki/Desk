<?php
use \yii\helpers\Html;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
    <div class="site-index">
        <?php echo Breadcrumbs::widget([
            'itemTemplate' => "<li><i>{link}</i></li>\n",
            'homeLink' => ['label' => 'Доска', 'url' => ['site/index']],
            'links' => [
                ['label' => 'Мой профиль', 'template' => "<li><b>{link}</b></li>\n"],
            ],
        ]); ?>
        <div class="body-content">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <h1>
                        <?php if($model->image): ?>
                            <img src="<?= $model->image?>" alt="" style="width: 500px;">
                        <?php endif; ?>
                    </h1>
                    <h1><?=  $model->name_profile. ' ' .$model->familia_profile. ' ' .$model->otchestvo_profile;  ?></h1>
                    <p><b>Дата регистрации: </b><?=$model->datereg?></p>
                    <p><b>Телефон: </b><?=$model->tel?></p>
                    <p><b>Город: </b><?=$model->city?></p>
                    <?= Html::a('Добавить объявление', ['/doska/create'], ['class' => 'btn btn-outline btn-sm btn-success']) ?>
                    <?= Html::a('Редактировать профиль', ['/profile/update'], ['class' => 'btn btn-outline btn-sm btn-info']) ?>
                </div>
            </div>
        </div>

    </div>
