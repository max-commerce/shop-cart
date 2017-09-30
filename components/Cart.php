<?php

namespace maxcom\cart\components;
use yii\base\Component;

class Cart extends Component
{

	public function init()
    {
        parent::init();

        // ... initialization after configuration is applied
    }

    public static function getItems()
    {
        return [];
    }

}