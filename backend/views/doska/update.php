<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Doska */

$this->title = 'Update Doska: ' . $model->id_doska;
$this->params['breadcrumbs'][] = ['label' => 'Doskas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_doska, 'url' => ['view', 'id' => $model->id_doska]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doska-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
