<?php

class Polcode_Helloworld_Block_Product 
    extends Mage_Core_Block_Template
{
    
    protected $products;
    
    protected function _prepareLayout() {
        $this->products = Mage::getModel('helloworld/product')->getCollection();
    }

    
    public function getProducts() {
        return $this->products;
    }


    
}
