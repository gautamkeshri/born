<?php
require_once "product.php";
class CartItem{    
    private $item;
    private $qty;
    private $action;

    public function __construct(){
        $this->item = NULL;
        $this->qty = 0;
    }

    public function setName(Product $product){
        $this->item = $product->getName();
    }

    public function setQty($qty){
        $this->qty = $qty;
    }
    public function setAction($action){
        $this->action = $action;
    }

    public function getAction(){
        return $this->action;
    }

    public function getName(){
        return $this->item;
    }

    public function getQty(){
        return $this->qty;
    }

    public function getOffer(Product $product){
        return $product->getGeoupprice();
    }
}
?>