<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => false,
    'tableOptions' => [
    	'class' => 'table'
    ],
    'columns' => [
    	[
    		'format' => 'raw',
    		'header' => 'Наименование',
    		'value' => function($item) {
    			return Html::a($item->product->title, $item->product->url);
    		}
    	],
        [
    		'header' => 'Цена',
    		'value' => function($item) {
    			return number_format($item->product->price, 2, '.', ' ');
    		}
    	],
    	[
    		'header' => 'Кол-во',
    		'value' => function($item) {
    			return $item->count;
    		}
    	],
        [
    		'header' => 'Сумма',
    		'value' => function($item) {
    			return number_format($item->total, 2, '.', ' ');
    		}
    	],
    	[
    		'format' => 'raw',
    		'value' => function($item) {
    			ob_start();
    			$form = ActiveForm::begin([
				    'id' => 'removeFromCart-form-' . $item->product_id,
				    'method' => 'post',
				    'action' => '/cart/remove-item'
				]);
				echo Html::hiddenInput('item_id', $item->product_id);
				echo Html::submitButton('&times;', ['class' => 'btn btn-danger btn-xs pull-right']);
				ActiveForm::end();
    			return ob_get_clean();
    		}
    	],
    ],
]);