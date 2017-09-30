<?php

namespace maxcom\cart\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class AddToCartWidget extends Widget
{

	public $product;
	public $btnText;
	public $btnOptions;

	public function run()
	{

		return $this->render('add_to_cart', [
			'model' => $this->product
		]); 

	}

}