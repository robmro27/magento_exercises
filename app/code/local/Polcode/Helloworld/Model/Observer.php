<?php

class Polcode_Helloworld_Model_Observer {
    
    public function checkProduct( $observer )
    {
        try {
            
            throw new \Exception('Test');
            
            // check if module is enabled
            if (!Mage::helper('helloworld/helper')->isEnabled()) {
                return $this;
            }

            // get sku from system settings
            $sku = Mage::getStoreConfig('polcode_section/product/sku');

            // check
            foreach ($observer->getEvent()->getOrder()->getAllItems() as $item)
            {

                if ( strtolower($sku) == strtolower($item->getProduct()['sku']) ) {

                    $product = Mage::getModel('helloworld/product');
                    $product->setSku($item->getProduct()['sku']);
                    $product->setProductId($item->getProduct()['entity_id']);
                    $product->setProductName($item->getProduct()['name']);
                    $product->setPrice($item->getProduct()['price']);
                    $product->setQty($observer->getEvent()->getOrder()['total_qty_ordered']);
                    $product->save();

                    break;

                }
            }
        } catch (\Exception $ex) 
        {
            Mage::log('Error in event: ' . __METHOD__ . " Error: " . $ex->getMessage(), null, 'event.log' , true);
        }
     
        return $this;
    }
    
}
