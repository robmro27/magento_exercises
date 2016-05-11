<?php

class Polcode_Helloworld_Model_Product 
    extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('helloworld/product');
    }
}
