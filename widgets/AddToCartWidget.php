<?php

namespace maxcom\cart\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class AddToCartWidget extends Widget
{

	public $product;
	public $btnText;
    public $ajax = true;
	public $btnOptions;
    public $ajaxResultCallback = "console.log(data); alert('Success!');";
	public function run()
	{
		return $this->render('add_to_cart', [
			'model' => $this->product
		]);
	}

}