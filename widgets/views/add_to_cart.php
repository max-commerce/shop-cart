<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
\maxcom\cart\assets\CartAsset::register($this);
$btnText = $this->context->btnText ? $this->context->btnText : 'Купить';
$btnOptions = $this->context->btnOptions ? $this->context->btnOptions : ['class' => 'btn btn-primary'];
$formId = 'addToCart-form-' . $model->id;
//Not sure about this (cause each button will register script but for now nice)
if($this->context->ajax){
	$this->registerJs("
		function maxCommAddToCartSuccess(data){
			".$this->context->ajaxResultCallback."
		}
	", \yii\web\View::POS_BEGIN);
}

$form = ActiveForm::begin([
    'id' => $formId,
	'options' => [
		'class' => \maxcom\cart\Module::ADD_TO_CART_FORM_CLASS,
	],
    'method' => 'post',
    'action' => '/cart/add-item'
]) ?>
	<?= Html::hiddenInput('product_id', $model->id) ?>
	<?= Html::submitButton($btnText, $btnOptions) ?>
<?php ActiveForm::end() ?>