<?php

$installer = $this;
 
$data = array(
    array(
        'link_type_id'                  => Mage_Catalog_Model_Product_Link::LINK_TYPE_RELATED,
        'product_link_attribute_code'   => 'essential',
        'data_type'                     => 'int'
    )
);
 
$installer->getConnection()->insertMultiple($installer->getTable('catalog/product_link_attribute'), $data);