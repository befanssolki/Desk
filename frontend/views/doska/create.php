<?php

use \yii\helpers\Html;
use \yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

$this->title = 'Добавить пост';
?>

    <div class="container">
        <?php echo Breadcrumbs::widget([
            'itemTemplate' => "<li><i>{link}</i></li>\n",
            'homeLink' => ['label' => 'Доска', 'url' => ['site/index']],
            'links' => [
                ['label' => 'Мой профиль', 'url' => ['profile/profile']],
                ['label' => 'Добавить объявление' , 'template' => "<li><b>{link}</b></li>\n"],
            ],
        ]); ?>
        <h1 class="text-center"><?= $this->title; ?></h1>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-sm-4 col-sm-offset-4">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'header')->textInput(['maxlength' => true])->label('Заголовок') ?>

                <?= $form->field($model, 'category')->dropDownList([
                'prompt' => 'Выберите категорию',
                    'Авто' => 'Авто',
                    'Телефоны' => 'Телефоны',
                ])->label(false); ?>

                <?= $form->field($model, 'price')->textInput(['maxlength' => true])->label('Цена') ?>

                <?= $form->field($models, 'image')->fileInput() ?>

                <?= $form->field($model, 'about')->textarea(['rows' => 10])->label('Описание') ?>

                <div class="form-group">
                    <?= Html::submitButton('Добавить объявление', ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>