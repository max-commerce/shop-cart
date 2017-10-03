<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$btnText = $this->context->btnText ? $this->context->btnText : 'Купить';
$btnOptions = $this->context->btnOptions ? $this->context->btnOptions : ['class' => 'btn btn-primary'];
//Service class for working with form from JS
$formClass = 'max-comm-add-to-cart-form';
$formId = 'addToCart-form-' . $model->id;
//Not sure about this (cause each button will register script but for now nice)
if($this->context->ajax){
	$this->registerJs("
		$(document).on('submit','.".$formClass."',function(e){
			e.preventDefault();
			$.post($(this).attr('action'),$(this).serialize(),function(data){
				".$this->context->ajaxResultCallback."
			});
		});	
	",\yii\web\View::POS_READY);
}

$form = ActiveForm::begin([
    'id' => $formId,
	'options' => [
		'class' => $formClass,
	],
    'method' => 'post',
    'action' => '/cart/add-item'
]) ?>
	<?= Html::hiddenInput('product_id', $model->id) ?>
	<?= Html::submitButton($btnText, $btnOptions) ?>
<?php ActiveForm::end() ?>