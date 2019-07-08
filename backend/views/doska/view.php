<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Doska */

$this->title = $model->id_doska;
$this->params['breadcrumbs'][] = ['label' => 'Doskas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="doska-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_doska], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Set image', ['set-image', 'id' => $model->id_doska], ['class' => 'btn btn-primary'])?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_doska], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_doska',
            'id_profile',
            'header',
            'category',
            'price',
            'photo',
            'date_pub',
            'about',
        ],
    ]) ?>

</div>
