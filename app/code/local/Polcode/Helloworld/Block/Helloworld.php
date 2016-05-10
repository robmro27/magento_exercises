<?php

class Polcode_Helloworld_Block_Helloworld 
    extends Mage_Core_Block_Template
{
    
    /**
     * prepare array with website hierarchy
     */
    protected function _prepareLayout()
    {
        foreach (Mage::app()->getWebsites() as $website) {
            foreach ($website->getGroups() as $group) {
                $stores = $group->getStores();
                foreach ($stores as $store) {
                    $this->websiteHierarchy[$website->getName()][$group->getName()][] = $store->getName();
                }
            }
        }
    }
    
    /**
     *
     * @var array 
     */
    protected $websiteHierarchy;
    
    /**
     * 
     * @return array
     */
    public function getWebsiteHierarchy() {
        return $this->websiteHierarchy;
    }

    
        
}
