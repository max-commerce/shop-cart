<?php

namespace maxcom\cart\controllers;

use yii\web\Controller;
use yii;

/**
 * Default controller
 */
class AddItemController extends Controller
{

    /**
     * @return mixed
     */
    public function actionIndex()
    {

		$product_id = (int)Yii::$app->request->post('product_id');

		if (empty($product_id)) {
			throw new yii\web\BadRequestHttpException('Bad Request.');
		}

		$product = Yii::$app->product->findOne($product_id);

		if (empty($product)) {
			throw new yii\web\NotFoundHttpException('Not found.');
		}

    	Yii::$app->cart->addItem($product_id);

        return $this->redirect('/cart');

    }
}
