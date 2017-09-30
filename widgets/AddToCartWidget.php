<?php

namespace maxcom\cart\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class AddToCartWidget extends Widget
{

	public $product;	

	public function run() {

		return '<form action="/cart/add">
				<input type="hidden" name="product_id" value="' . $this->product->id . '" />
				<input type="submit" class="btn btn-primary" value="Купить" />
			</form>';

	}

}