<?php
class Product{
    private $name;
    private $price;
    private $groupprice;
    public function __construct($name,$price){
        $this->name = $name; 
        $this->price = $price;
    }

    public function setGeoupprice(CartRule $groupprice = null){
        $this->groupprice = $groupprice;
    }
    public function getGeoupprice(){
        return $this->groupprice;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getName(){
        return $this->name;
    }    
    
}
?>