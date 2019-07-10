<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Borovets\Blog\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '0.0.2') < 0) {
            $connection = $setup->getConnection();
            $connection->addColumn(
                $setup->getTable('borovets_blog_post'),
                'description',
                [
                    'type' => Table::TYPE_TEXT,
                    'size' => '64k',
                    'comment' => 'Post Description'
                ]
            );
        }

        $setup->endSetup();
    }
}
