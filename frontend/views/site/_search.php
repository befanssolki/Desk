<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DoskaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doska-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    <div class="row">
        <div class="col-md-4">
    <?= $form->field($model, 'category')->dropDownList([
        'prompt' => 'Выберите категорию',
        'Авто' => 'Авто',
        'Телефоны' => 'Телефоны',
    ])->label(false); ?>
        </div>
        <div class="col-md-4">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
