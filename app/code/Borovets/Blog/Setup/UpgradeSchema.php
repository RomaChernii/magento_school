<?php
/**
 * Blog upgrade schema
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
        if (version_compare($context->getVersion(), '0.0.3') < 0) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable('borovets_blog_comment')
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
                50,
                [],
                'First name'
            )->addColumn(
                'last_name',
                Table::TYPE_TEXT,
                50,
                [],
                'Last name'
            )->addColumn(
                'email',
                Table::TYPE_TEXT,
                50,
                [],
                'Email'
            )->addColumn(
                'comment',
                Table::TYPE_TEXT,
                '2M',
                [],
                'Comment'
            )->addColumn(
                'answer',
                Table::TYPE_TEXT,
                '2M',
                [],
                'Answer'
            )->addColumn(
                'status',
                Table::TYPE_SMALLINT,
                null,
                [
                    'nullable' => false,
                    'default' => '1'
                ],
                'Status'
            )->addColumn(
                'writed_at',
                Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT
                ],
                'Comment writed at'
            )->addColumn(
                'post_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'unsigned' => true,
                    'nullable' => false
                ],
                'Post id'
            )->addForeignKey(
                $setup->getFkName('borovets_blog_comment', 'post_id', 'borovets_blog_post', 'id'),
                'post_id',
                $setup->getTable('borovets_blog_post'),
                'id',
                Table::ACTION_CASCADE
            )->setComment(
                'Blog Comment Table'
            );

            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}
