<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Doska */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doska-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_profile')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([
        'prompt' => 'Выберите статус',
        '0' => 'Не активен',
        '1' => 'Активен',
    ])->label('Статус'); ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->fileInput() ?>

    <?= $form->field($model, 'date_pub')->textInput() ?>

    <?= $form->field($model, 'about')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
