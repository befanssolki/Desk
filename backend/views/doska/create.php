<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Doska */

$this->title = 'Create Doska';
$this->params['breadcrumbs'][] = ['label' => 'Doskas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doska-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
