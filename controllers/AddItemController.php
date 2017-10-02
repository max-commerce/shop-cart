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
        $product_count = (int) Yii::$app->request->post('product_count') ? (int) Yii::$app->request->post('product_count') : 1;
		$product_id = (int)Yii::$app->request->post('product_id');

		if (empty($product_id)) {
            if (Yii::$app->request->isAjax){
                return $this->asJson(['status' => 'error']);
            } else {
                throw new yii\web\BadRequestHttpException('Bad Request.');
            }
		}

		$product = Yii::$app->product->findOne($product_id);

        if (empty($product)) {
            if (Yii::$app->request->isAjax){
                return $this->asJson(['status' => 'error', 'code' => '404']);
            } else {
                throw new yii\web\NotFoundHttpException('Not found.');
            }
		}

    	Yii::$app->cart->addItem($product_id,$product_count);

        if (Yii::$app->request->isAjax){
            return $this->asJson(Yii::$app->cart->status);
        } else {
            return $this->redirect('/cart');
        }


    }
}
