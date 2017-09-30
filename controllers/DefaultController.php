<?php

namespace maxcom\cart\controllers;

use yii\web\Controller;

/**
 * Default controller
 */
class DefaultController extends Controller
{

    /**
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index');

    }
}
