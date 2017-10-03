<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$btnText = $this->context->btnText ? $this->context->btnText : 'Купить';
$btnOptions = $this->context->btnOptions ? $this->context->btnOptions : ['class' => 'btn btn-primary'];

$formId = 'addToCart-form-' . $model->id;
//Not sure about this (cause each button will register script but for now nice)
if($this->context->ajax){
	$this->registerJs("
		$(document).on('submit','#".$formId."',function(e){
			e.preventDefault();
			$.post($(this).attr('action'),$(this).serialize(),function(data){
				".$this->context->ajaxResultCallback."
			});
		});	
	");
}

$form = ActiveForm::begin([
    'id' => $formId,
    'method' => 'post',
    'action' => '/cart/add-item'
]) ?>
	<?= Html::hiddenInput('product_id', $model->id) ?>
	<?= Html::submitButton($btnText, $btnOptions) ?>
<?php ActiveForm::end() ?>