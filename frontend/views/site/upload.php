<?php
use yii\widgets\ActiveForm;
?>

<?php if($model->image): ?>
    <img src="/uploads/<?= $model->image?>" alt="">
<?php endif; ?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?= $form->field($model, 'image')->fileInput() ?>
<button>Загрузить</button>
<?php ActiveForm::end() ?>