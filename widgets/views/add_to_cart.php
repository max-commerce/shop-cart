<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$btnText = $this->context->btnText ? $this->context->btnText : 'Купить';
$btnOptions = $this->context->btnOptions ? $this->context->btnOptions : ['class' => 'btn btn-primary'];

$form = ActiveForm::begin([
    'id' => 'addToCart-form-' . $model->id,
    'method' => 'post',
    'action' => '/cart/add-item'
]) ?>

	<?= Html::hiddenInput('product_id', $model->id) ?>
	<?= Html::submitButton($btnText, $btnOptions) ?>

<?php ActiveForm::end() ?>