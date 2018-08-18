<?php
class CartRule {
    private $rulename;
    private $ruleQty;
    private $rulePrice;

    public function getRuleName(){
        return $this->rulename;
    }

    public function setRuleName($rulename){
        $this->rulename = $rulename;
    }

    public function getRuleQty(){
        return $this->ruleQty;
    }

    public function setRuleQty($ruleQty){
        $this->ruleQty = $ruleQty;
    }

    public function getRulePrice(){
        return $this->rulePrice;
    }

    public function setRulePrice($rulePrice){
        $this->rulePrice = $rulePrice;
    }
}
?>