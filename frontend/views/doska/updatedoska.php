<?php

use \yii\helpers\Html;
use \yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

$this->title = 'Редактировать объявление';
?>

    <div class="container">
        <?php echo Breadcrumbs::widget([
            'itemTemplate' => "<li><i>{link}</i></li>\n",
            'homeLink' => ['label' => 'Доска', 'url' => ['site/index']],
            'links' => [
                ['label' => 'Мои объявления', 'url' => ['profiledoska']],
                ['label' => 'Редактировать объявление - '.$model->header, 'template' => "<li><b>{link}</b></li>\n"],
            ],
        ]); ?>
        <h1 class="text-center"><?= $this->title; ?> - <?= $model->header ?></h1>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-sm-4 col-sm-offset-4">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'category')->dropDownList([
                    'prompt' => 'Выберите категорию',
                    'Авто' => 'Авто',
                    'Телефоны' => 'Телефоны',
                ]); ?>

                <?= $form->field($model, 'status')->dropDownList([
                    'prompt' => 'Выберите статус',
                    'Не активен' => 'Не активен',
                    'Активен' => 'Активен',
                ])->label('Статус'); ?>

                <?= $form->field($models, 'image')->fileInput() ?>

                <?= $form->field($model, 'about')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
