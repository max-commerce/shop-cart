<?php

namespace maxcom\cart\widgets;

use Yii;
use yii\base\Widget;

class CartTableWidget extends Widget
{

  public $items;

  public function init() {

      $this->items = Yii::$app->cart->getItems();

  }

  public function run() {

    return $this->render('cart_table', [
      'items' => $this->items
    ]);

  }

}