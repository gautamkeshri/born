<?php
class Cart {
    private $total;
    private $totalQty;
    private $cartarrayobj; 
    private $cartprods; 
    private $cartitem;
    private $items = [];
    
    public function __construct(){
        $this->total = 0;
        $this->totalQty = 0;
        $this->cartarrayobj = new ArrayObject();
        $this->cartprods = array();
    }
    private function calculateTotal(){
        $total = $qty * $price;
        return $total;

    }
    public function getTotal(){
        return $this->total;
    }

    public function setTotal($total){
        $this->$total = $total;
    }

    public function addtocart($qty,Product $product){
        $this->cartitem = new CartItem();
        $this->cartitem->setName($product);
        $this->cartitem->setQty($qty);
        $this->cartitem->setAction("Add");
        $this->cartarrayobj->append($this->cartitem);
        echo sprintf("Adding Prod:%s \t%d \tx \t%.2f \t%.2f",$product->getName(),$qty,$product->getPrice(),$qty*$product->getPrice())."\n";
    }
    
    public function cartActions(){
        $iterator = $this->cartarrayobj->getIterator();
        while ($iterator->valid()) {
            $cart_data = $iterator->current();
            echo sprintf("%s Prod:%s \t%d \tx",$cart_data->getAction(),$cart_data->getName(),$cart_data->getQty())."\n";
            $iterator->next();
        }
    }

    public function cartItems(){        
        $iterator = $this->cartarrayobj->getIterator();
        $crritems = $this->getItems();
        while ($iterator->valid()) {
            $cart_data = $iterator->current();
            if (array_key_exists($cart_data->getName(),$crritems)) {
                $crritems[$cart_data->getName()] = $crritems[$cart_data->getName()]+$cart_data->getQty();
            }else{
                $crritems[$cart_data->getName()] = $cart_data->getQty();
            }
            $iterator->next();
        }
        foreach($crritems as $key => $value){
            echo sprintf("Prod:%s \t%.2f",$key,$value)."\n";
        }
        
    }

    /**
     * return boolean
     */
    private function hasCartItem(CartItem $item){
        $hasproduct = false;
        $iterator = $this->cartarrayobj->getIterator();
        while ($iterator->valid()) {
            $cart_data = $iterator->current();
            if($cart_data->getName() == $item->getName()){
                $hasproduct = true;
                break;
            }
            $iterator->next();
        }
        return $hasproduct;
    }

    

    /**
	 * Get items in  cart.
	 *
	 * @return array
	 */
	public function getItems()
	{
		return $this->items;
	}
	/**
	 * Check if the cart is empty.
	 *
	 * @return bool
	 */
	public function isEmpty()
	{
		return empty(array_filter($this->items));
    }
    
    /**
	 * Check if a item exist in cart.
	 */
	public function isItemExists()
	{
		
	}
}
?>