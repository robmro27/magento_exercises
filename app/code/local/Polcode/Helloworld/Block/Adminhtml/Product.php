<?php


class Polcode_Helloworld_Block_Adminhtml_Product extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'helloworld';
        $this->_controller = 'adminhtml_product';
        $this->_headerText = $this->__('Polcode Products');
         
        parent::__construct();
    }

}