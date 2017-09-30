<?php

namespace maxcom\cart\controllers;

use yii\web\Controller;

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

        return $this->redirect('/cart');

    }
}
