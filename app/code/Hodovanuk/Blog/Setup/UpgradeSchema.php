<?php
namespace Hodovanuk\Blog\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Class UpgradeSchema
 * @package Hodovanuk\Blog\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Add description column to exist table
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();
        $installer->getConnection()->addColumn(
            $installer->getTable('hodovanuk_blog_post'),
            'description',
            ['type' => Table::TYPE_TEXT,
                'size' => '64k',
                'comment' => 'Post Description']);
        $setup->endSetup();
    }
}
