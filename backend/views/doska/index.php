<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\DoskaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doskas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doska-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Doska', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_doska',
            'id_profile',
            'status',
            'header',
            'category',
            'price',
            [
                    'format' => 'html',
                'label' => 'Image',
                'value' => function($data) {
                    return Html::img($data->getImage(), ['width'=>200]);
                }
            ],
            //'date_pub',
            'about',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
