<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DoskaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doska-search">
, 'ph
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_doska') ?>

    <?= $form->field($model, 'id_profile') ?>

    <?= $form->field($model, 'header') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($modeloto') ?>

    <?php // echo $form->field($model, 'date_pub') ?>

    <?php // echo $form->field($model, 'about') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
