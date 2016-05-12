<?php

class Polcode_Helloworld_Block_Adminhtml_Product_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
         
        // Set some defaults for our grid
        $this->setDefaultSort('id');
        $this->setId('helloworld_product_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }
     
    protected function _getCollectionClass()
    {
        // This is the model we are using for the grid
        return 'helloworld/product_collection';
    }
     
    protected function _prepareCollection()
    {
        // Get and set our collection for the grid
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);
         
        return parent::_prepareCollection();
    }
     
    protected function _prepareColumns()
    {
        // Add the columns that should appear in the grid
        $this->addColumn('id',
            array(
                'header'=> $this->__('ID'),
                'align' =>'right',
                'width' => '50px',
                'index' => 'id'
            )
        );
         
        $this->addColumn('sku',
            array(
                'header'=> $this->__('Sku'),
                'index' => 'sku'
            )
        );
        
        $this->addColumn('order_date',
            array(
                'header'=> $this->__('Order Date'),
                'index' => 'order_date',
                'type'  => 'date'
            )
        );
        
        $this->addColumn('price',
            array(
                'header'=> $this->__('Price'),
                'index' => 'price'
            )
        );
        
        $this->addColumn('qty',
            array(
                'header'=> $this->__('Qty'),
                'index' => 'qty'
            )
        );
         
        return parent::_prepareColumns();
    }
     
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
