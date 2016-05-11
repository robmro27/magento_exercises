<?php

$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');
$installer->startSetup();

$installer->addAttribute('catalog_product', 'custom_pdf_product', array(
    'group'                    => 'General',
    'label'                    => 'Pdf file',
    'input'                    => 'pdf',
    'type'                     => 'varchar',
    'backend'                  => 'helloworld/product_attribute_backend_file',
    'global'                   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'                  => true,
    'required'                 => false,
    'user_defined'             => true,
    'order'                    => 20
));
$installer->addAttribute('catalog_category', 'custom_pdf_category', array(
    'group'                    => 'General Information',
    'label'                    => 'Pdf file',
    'input'                    => 'pdf',
    'type'                     => 'varchar',
    'backend'                  => 'helloworld/category_attribute_backend_file',
    'global'                   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'                  => true,
    'required'                 => false,
    'user_defined'             => true,
    'order'                    => 20
));
$installer->endSetup();