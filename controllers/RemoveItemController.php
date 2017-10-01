<?php

namespace maxcom\cart\controllers;

use yii\web\Controller;
use yii;

/**
 * Default controller
 */
class RemoveItemController extends Controller
{

    /**
     * @return mixed
     */
    public function actionIndex()
    {

		$item_id = (int)Yii::$app->request->post('item_id');

		if (empty($item_id)) {
			throw new yii\web\BadRequestHttpException('Bad Request.');
		}

    	Yii::$app->cart->removeItem($item_id);

        return $this->redirect('/cart');

    }
}
