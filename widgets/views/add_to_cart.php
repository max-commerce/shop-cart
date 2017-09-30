<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'addToCart-form-' . $model->id,
    'method' => 'post',
    'action' => '/cart/add-item'
]) ?>

	<?= Html::hiddenInput('product_id', $model->id) ?>
	<?= Html::submitButton('Купить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>