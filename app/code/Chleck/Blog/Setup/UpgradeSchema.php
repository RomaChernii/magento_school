<?php

namespace Chleck\Blog\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Class UpgradeSchema
 * @package Chleck\Blog\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.1') < 0) {
            $setup->getConnection()->addColumn(
                $setup->getTable('chleck_blog_post'),
                'description',
                [
                    'type' => Table::TYPE_TEXT,
                    'length' => '64k',
                    'comment' => 'Post Description'
                ]
            );
        }
        $setup->endSetup();
    }
}

////////////// For example/////////////////

/*public function upgrade(
    SchemaSetupInterface $setup,
    ModuleContextInterface $context
) {
    $installer = $setup;

    $installer->startSetup();
    if (version_compare($context->getVersion(), "1.0.0", "<")) {
        //Your upgrade script
    }
    if (version_compare($context->getVersion(), '1.0.1', '<')) {
        $installer->getConnection()->addColumn(
            $installer->getTable('lime_eleveniacategory'),
            'category_depth',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                'length' => 10,
                'nullable' => true,
                'comment' => 'Category Depth'
            ]
        );
    }
    $installer->endSetup();
}*/
