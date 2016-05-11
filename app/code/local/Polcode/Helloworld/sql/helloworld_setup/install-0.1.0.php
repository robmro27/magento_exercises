<?php

$installer = $this;

$installer->startSetup();

$installer->run('CREATE TABLE `polcode_product` (
                        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                        `sku` VARCHAR(50) NOT NULL DEFAULT \'0\',
                        PRIMARY KEY (`id`)
                )
                COLLATE=\'utf8_general_ci\'
                ENGINE=InnoDB
                ;');

$installer->endSetup();