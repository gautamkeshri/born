<?php
require_once "product.php";
require_once "cartrule.php";
require_once "cartItem.php";
require_once "cart.php";
class Base {
    public function main(){
        $cart = new Cart();
        $prodA = new Product("A",2);
        $prodArule = new CartRule();
        $prodArule->setRuleName("Offer1");
        $prodArule->setRuleQty(4);
        $prodArule->setRulePrice(7);
        $prodA->setGeoupprice($prodArule);

        $prodB = new Product("B",12.00);

        $prodC = new Product("C",1.25);
        $prodBrule = new CartRule();
        $prodBrule->setRuleName("Offer1");
        $prodBrule->setRuleQty(6);
        $prodBrule->setRulePrice(6);
        $prodC->setGeoupprice($prodBrule);


        $cart->addtocart(2,$prodA);
        $cart->addtocart(1,$prodB);
        $cart->addtocart(2,$prodA);
        $cart->addtocart(5,$prodC);

        echo sprintf("===============")."\n";
        $cart->cartActions();

        echo sprintf("===============")."\n";
        $cart->cartItems();


        echo sprintf("Total:\t\t\t\t\t%d",$cart->getTotal())."\n";
        
    }
}

$Base = new Base();
$Base->main();

?>