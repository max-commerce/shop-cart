<?php

namespace maxcom\cart;

/**
 * cart module definition class
 */
class Module extends \yii\base\Module
{
    //Service class for working with form from JS
    const ADD_TO_CART_FORM_CLASS = 'max-comm-add-to-cart-form';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'maxcom\cart\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
}
