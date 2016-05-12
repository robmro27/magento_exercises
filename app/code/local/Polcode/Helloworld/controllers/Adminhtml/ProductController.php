<?php

class Polcode_Helloworld_Adminhtml_ProductController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {  
        // Let's call our initAction method which will set some basic params for each action
        $this->_initAction()
            ->renderLayout();
    }  
     
    public function newAction()
    {  
        // We just forward the new action to a blank edit form
        $this->_forward('edit');
    }  
     
    public function editAction()
    {  
     
        // Get id if available
        $id  = $this->getRequest()->getParam('id');
        $model = Mage::getModel('helloworld/product');
     
        if ($id) {
            
            // Load record
            $model->load($id);
     
            // Check if record is loaded
            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This baz no longer exists.'));
                $this->_redirect('*/*/');
     
                return;
            }  
        }  
     
        $this->_title($model->getId() ? $model->getName() : $this->__('New Product'));
     
        $data = Mage::getSingleton('adminhtml/session')->getProductData(true);
        if (!empty($data)) {
            $model->setData($data);
        }  
     
        Mage::register('helloworld', $model);
     
        $this->_initAction()
            ->_addBreadcrumb($id ? $this->__('Edit Product') : $this->__('New Product'), $id ? $this->__('Edit Product') : $this->__('New Product'))
            ->_addContent($this->getLayout()->createBlock('helloworld/adminhtml_product_edit')->setData('action', $this->getUrl('*/*/save')))
            ->renderLayout();
    }
     
    
    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost()) {
            
            // set product id by sku
            $sku = $postData['sku'];
            $product = Mage::getModel('catalog/product')->loadByAttribute('sku',$sku);
            $postData['product_id'] = $product->getId();
            
            $model = Mage::getSingleton('helloworld/product');
            $model->setData($postData);
            
            try {
                
                $model->save();
                
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The product has been saved.'));
                $this->_redirect('*/*/');
                return;
            }  
            catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this product.'));
            }
            
            Mage::getSingleton('adminhtml/session')->setProductData($postData);
            $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            
        }
    }
     
    
    public function deleteAction()
    {
        if($this->getRequest()->getParam('id') > 0)
        {
          try
          {
              
              $model = Mage::getModel('helloworld/product');
              $model->setId($this->getRequest()->getParam('id'))->delete();
              Mage::getSingleton('adminhtml/session')->addSuccess('Product deleted');
              $this->_redirect('*/*/');
           }
           catch (Exception $e)
           {
                Mage::getSingleton('adminhtml/session')
                     ->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
           }
       }
      $this->_redirect('*/*/');
    }
    
    
    public function messageAction()
    {
        $data = Mage::getModel('helloworld/product')->load($this->getRequest()->getParam('id'));
        echo $data->getContent();
    }
     
    /**
     * Initialize action
     *
     * Here, we set the breadcrumbs and the active menu
     *
     * @return Mage_Adminhtml_Controller_Action
     */
    protected function _initAction()
    {
        $this->loadLayout()
            // Make the active menu match the menu config nodes (without 'children' inbetween)
            ->_setActiveMenu('sales/helloworld_product')
            ->_title($this->__('Sales'))->_title($this->__('Polcode Sold Products'))
            ->_addBreadcrumb($this->__('Sales'), $this->__('Sales'))
            ->_addBreadcrumb($this->__('Polcode Sold Products'), $this->__('Polcode Sold Products'));
         
        return $this;
    }
     
    /**
     * Check currently called action by permissions for current user
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('sales/helloworld_product');
    }
}
