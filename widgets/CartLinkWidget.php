<?php
namespace maxcom\cart\widgets;

use yii\helpers\Html;
use Yii;
class CartLinkWidget extends \yii\base\Widget {
    public $url = ['/cart'];
    public $rawCartLink;
    public $content;
    public function init()
    {
        if(empty($this->content)){
            $this->content =
                Html::tag('i','',['class' => 'fa fa-shopping-cart fa-fw']).' '.
                Html::tag('span',\Yii::$app->cart->itemsCount,['class' => 'maxcom-cart-link-count']).' '.
                Html::tag('span',Yii::$app->cart->total,['class' => 'maxcom-cart-link-total']);
        } else {
            $this->content = preg_replace(['/{count}/','/{total}/'],[Yii::$app->cart->itemsCount,Yii::$app->cart->total],$this->content);
        }

        if(empty($this->rawCartLink)){
            $this->rawCartLink = Html::a($this->content,$this->url);
        }
    }

    public function run(){
        return $this->rawCartLink;
    }
}