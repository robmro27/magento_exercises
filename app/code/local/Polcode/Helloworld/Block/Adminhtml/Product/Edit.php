<?php

class Polcode_Helloworld_Block_Adminhtml_Product_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Init class
     */
    public function __construct()
    {  
        $this->_blockGroup = 'helloworld';
        $this->_controller = 'adminhtml_product';
     
        parent::__construct();
     
        $this->_updateButton('save', 'label', $this->__('Save Product'));
        $this->_updateButton('delete', 'label', $this->__('Delete Product'));
    }  
     
    /**
     * Get Header text
     *
     * @return string
     */
    public function getHeaderText()
    {  
        if (Mage::registry('helloworld')->getId()) {
            return $this->__('Edit Product');
        }  
        else {
            return $this->__('New Product');
        }  
    }  
}
