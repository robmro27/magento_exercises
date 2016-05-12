<?php

class Essential_Related_Model_Observer {
    
    public function controllerActionLayoutLoadBefore(Varien_Event_Observer $observer)
    {            
        /** @var $layout Mage_Core_Model_Layout */
        $layout = $observer->getEvent()->getLayout();
        $layout->getUpdate()->addHandle('catalog_product_view_essential_related');
    }
}
