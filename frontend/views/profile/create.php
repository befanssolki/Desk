<?php

use \yii\helpers\Html;
use \yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;

$this->title = 'Создание профиля';
?>

    <div class="container">
       <?php echo Breadcrumbs::widget([
        'itemTemplate' => "<li><i>{link}</i></li>\n",
           'homeLink' => ['label' => 'Доска', 'url' => ['site/index']],
        'links' => [
        ['label' => 'Мой профиль', 'url' => ['profile'],],
        ['label' => 'Редактировать профиль', 'template' => "<li><b>{link}</b></li>\n",],
        ],
        ]); ?>
        <h1 class="text-center"><?= $this->title; ?></h1>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-sm-4 col-sm-offset-4">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name_profile')->input('name_profile', ['maxlength' => true])->label('Имя') ?>

                <?= $form->field($model, 'familia_profile')->input('familia_profile', ['maxlength' => true])->label('Фамилия') ?>

                <?= $form->field($model, 'otchestvo_profile')->input('otchestvo_profile', ['maxlength' => true])->label('Отчество') ?>

                <?= $form->field($model, 'city')->dropDownList([
                    'prompt' => 'Выберите город',
                    'Томск' => 'Томск',
                    'Северск' => 'Северск',
                    'Новосибирск' => 'Новосибирск',
                    'Кемерово' => 'Кемерово',
                ])->label('Город'); ?>

                <?= $form->field($images, 'image')->fileInput() ?>

                <?= $form->field($model, 'tel')->input('tel')->label('Телефон') ?>


                <div class="form-group">
                    <?= Html::submitButton('Создать профиль', ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>