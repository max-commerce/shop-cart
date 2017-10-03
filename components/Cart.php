<?php

namespace maxcom\cart\components;
use yii\base\Component;
use yii;
use maxcom\cart\models\LineItem;

class Cart extends Component
{

	const CART_SESSION_KEY = 'cart-session-key';
	
	private $_items;

	public function init()
    {
        parent::init();
        $this->loadItemsRepository();
    }

    /**
     *
     */
    public function getItems()
    {
        return $this->_items;
    }

    /**
     * @return array
     */
    public function getStatus(){
        return [
            'status' => 'success',
            'total' => $this->total,
            'products_count' => count($this->items),
        ];
    }
    /**
     *
     */
    public function getTotal()
    {
    	$total = 0;
    	if ($this->_items) {
	        foreach ($this->_items as $item) {
	        	$total += $item->total;
	        }
    	}
        return $total;
    }


    public function loadItemsRepository()
    {
        
        $_items = (array)json_decode(Yii::$app->session->get(self::CART_SESSION_KEY));

        if ($_items) {
	        foreach ($_items as $data) {

	        	// проверяем что есть id товара
	        	if (!empty($data->product_id)) {

		        	$lineItem = $this->createLineItem($data->product_id, $data->count);

					// проверяем что такой товар существует в базе
		        	if (!empty($lineItem->product)) {
						$this->_items[$data->product_id] = $lineItem;
		        	}

	        	}

	        }
	    }

    }

    public function saveItemsRepository()
    {
        return Yii::$app->session->set(self::CART_SESSION_KEY, json_encode($this->_items));
    }
    /**
     *
     */
    public function addItem($product_id, $count = 1)
    {


        if(isset($this->_items[$product_id])){
            $this->_items[$product_id]->count += 1;
        } else {
            $lineItem = $this->createLineItem($product_id, $count);
            $this->_items[$product_id] = $lineItem;
        }


    	$this->saveItemsRepository();
    }

    /**
     *
     */
    public function removeItem($product_id)
    {
    	unset($this->_items[$product_id]);
    	$this->saveItemsRepository();
    }

    /**
     *
     */
    public function createLineItem($product_id, $count = 1)
    {

    	$lineItem = new LineItem();
	    $lineItem->product_id = $product_id;
	    $lineItem->count = $count;

	    return $lineItem;
    }

}