<?php



$installer = $this;

$installer->startSetup();

$installer->run("ALTER TABLE " . $this->getTable('helloworld/product') . "
	ADD COLUMN `order_date` TIMESTAMP NOT NULL AFTER `id`,
	CHANGE COLUMN `sku` `sku` VARCHAR(50) NOT NULL DEFAULT '0' AFTER `order_date`,
	ADD COLUMN `product_id` INT NOT NULL AFTER `sku`,
	ADD COLUMN `price` DECIMAL(8,2) NOT NULL AFTER `product_id`,
	ADD COLUMN `qty` INT(11) NOT NULL AFTER `price`;");

$installer->run("ALTER TABLE "  . $this->getTable('helloworld/product') . "
	CHANGE COLUMN `product_id` `product_id` INT(10) UNSIGNED NOT NULL AFTER `sku`,
	ADD CONSTRAINT `FK_polcode_product_catalog_product_entity` 
        FOREIGN KEY (`product_id`) 
        REFERENCES `catalog_product_entity` (`entity_id`) 
        ON UPDATE NO ACTION ON DELETE NO ACTION;");

$installer->endSetup();

