<?php

class Polcode_Helloworld_Block_Adminhtml_Product_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init class
     */
    public function __construct()
    {  
        parent::__construct();
     
        $this->setId('helloworld_product_form');
        $this->setTitle($this->__('Product Information'));
    }  
     
    /**
     * Setup form fields for inserts/updates
     *
     * return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {  
        $model = Mage::registry('helloworld');
     
        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'    => 'post'
        ));
     
        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => Mage::helper('checkout')->__('Product Information'),
            'class'     => 'fieldset-wide',
        ));
     
        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array(
                'name' => 'id',
            ));
        }  
     
        $fieldset->addField('sku', 'text', array(
            'name'       => 'sku',
            'label'     => Mage::helper('checkout')->__('Sku'),
            'title'     => Mage::helper('checkout')->__('Sku'),
            'required'  => true,
            'style'     => 'width:110px !important;'
        ));
        
        $fieldset->addField('order_date', 'date', array(
            'name'       => 'order date',
            'label'     => Mage::helper('checkout')->__('Order Date'),
            'title'     => Mage::helper('checkout')->__('Order Date'),
            'image'     => $this->getSkinUrl('images/grid-cal.gif'),    
            'format'    => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'required'  => true,
        ));      
     
        $fieldset->addField('price', 'text', array(
            'name'       => 'price',
            'label'     => Mage::helper('checkout')->__('Price'),
            'title'     => Mage::helper('checkout')->__('Price'),
            'required'  => true,
            'style'     => 'width:110px !important;'
        ));
        
        $fieldset->addField('qty', 'text', array(
            'name'       => 'qty',
            'label'     => Mage::helper('checkout')->__('Qty'),
            'title'     => Mage::helper('checkout')->__('Qty'),
            'required'  => true,
            'style'     => 'width:110px !important;'
        ));
        
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
     
        return parent::_prepareForm();
    }  
}