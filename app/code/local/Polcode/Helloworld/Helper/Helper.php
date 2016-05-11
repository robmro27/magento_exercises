<?php

class Polcode_Helloworld_Helper_Helper 
    extends Mage_Core_Helper_Abstract
{
    public function isEnabled()
    {
        return Mage::getStoreConfigFlag('polcode_section/product/enabled');
    }
}
