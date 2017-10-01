<?php

namespace maxcom\cart\models;

use yii\base\Model;
use yii;

class LineItem extends Model {

	public $product_id;

	public $count;

	public function getProduct() {
		return Yii::$app->product->findOne($this->product_id);
	}

	public function getTotal() {
		return $this->product->price * $this->count;
	}

}