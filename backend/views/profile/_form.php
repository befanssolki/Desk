<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'id_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_profile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_profile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'familia_profile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otchestvo_profile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about_profile')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'datereg')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
