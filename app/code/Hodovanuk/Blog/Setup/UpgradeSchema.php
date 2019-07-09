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

    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();
        if (version_compare($context->getVersion(), '0.0.2') < 0) {
            $installer->getConnection()->addColumn(
                $installer->getTable('hodovanuk_blog_post'),
                'description',
                ['type' => Table::TYPE_TEXT,
                    'size' => '64k',
                    'comment' => 'Post Description']);
        }

        if((version_compare($context->getVersion(), '0.0.3') < 0) ){
            $table = $installer->getConnection()->newTable(
                $installer->getTable('hodovanuk_blog_comment')
            )->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ],
                'Comment id'
            )->addColumn(
                'first_name',
                Table::TYPE_TEXT,
                255,
                [],
                'Creator first name'
            )->addColumn(
                'last_name',
                Table::TYPE_TEXT,
                255,
                [],
                'Creator last name'
            )->addColumn(
                'answer',
                Table::TYPE_SMALLINT,
                null,
                [
                    'nullable' => false,
                    'default' => '1'
                ],
                'Comment status'
            )->addColumn(
                'comment',
                Table::TYPE_TEXT,
                '2M',
                [],
                'User comment'
            )->addColumn(
                'data',
                Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT
                ],
                'Comment created at'
            )->addColumn(
                'post_id',
                Table::TYPE_INTEGER,
                null,
                [],
                'post foreignkey'
            )->setComment(
                'Blog Comment Table'
            );
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
