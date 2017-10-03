<?php

namespace maxcom\cart\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class CartAsset extends AssetBundle
{
    public $sourcePath = __DIR__;
//    public $jsOptions = ['position' => Vi];
    public $js = [
        'js/script.js'
    ];

}
