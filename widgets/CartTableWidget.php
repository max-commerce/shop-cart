<?php

namespace maxcom\cart\widgets;

use Yii;
use yii\base\Widget;
use yii\data\ArrayDataProvider;

class CartTableWidget extends Widget
{

  public $dataProvider;

  public function init() {

      $this->dataProvider = new ArrayDataProvider([
          'allModels' => Yii::$app->cart->items
      ]);

  }

  public function run() {

    return $this->render('cart_table', [
      'dataProvider' => $this->dataProvider
    ]);

  }

}