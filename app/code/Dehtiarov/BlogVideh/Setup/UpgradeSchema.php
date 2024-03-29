<?php


namespace Dehtiarov\BlogVideh\Setup;

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
            $setup->getConnection()->addColumn(
                $setup->getTable('videh_blog_post'),
                'description',
                [
                    'type' => Table::TYPE_TEXT,
                    'length' => '64k',
                    'comment' => 'Post Description'
                ]
            );
        }

        if (version_compare($context->getVersion(), '0.0.3') < 0) {
            $setup->startSetup();

            $table = $setup->getConnection()->newTable(
                $setup->getTable('videh_blog_comment')
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
                'Post id',
                Table::TYPE_INTEGER,
                null,
                [],
                'Post id'
            )->addColumn(
                'First name',
                Table::TYPE_TEXT,
                255,
                [],
                'First name'
            )->addColumn(
                'Last name',
                Table::TYPE_TEXT,
                255,
                [],
                'Last name'
            )->addColumn(
                'Email',
                Table::TYPE_TEXT,
                255,
                [],
                'Email'
            )->addColumn(
                'Comment',
                Table::TYPE_TEXT,
                '2M',
                [],
                'Comment'
            )->addColumn(
                'Answer',
                Table::TYPE_TEXT,
                '2M',
                [],
                'Answer'
            )->addColumn(
                'Status',
                Table::TYPE_SMALLINT,
                null,
                [
                    'nullable' => false,
                    'default' => '1'
                ],
                'Is Post Active'
            )->addForeignKey(
                $setup->getFkName('videh_blog_comment', 'id', 'videh_blog_post', 'id'),
                'id',
                $setup->getTable('videh_blog_post'),
                'id',
                Table::ACTION_CASCADE
            )->setComment(
                'Blog Comment Table'
            );

            $setup->getConnection()->createTable($table);

            $setup->endSetup();
        }

        if (version_compare($context->getVersion(), '0.0.4') < 0) {
            $setup->startSetup();

            $connection = $setup->getConnection();
            $connection->dropTable($connection->getTableName('videh_blog_comment'));


            $table = $connection->newTable(
                $setup->getTable('videh_blog_comment')
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
                'post_id',
                Table::TYPE_INTEGER,
                null,
                [],
                'Post id'
            )->addColumn(
                'first_name',
                Table::TYPE_TEXT,
                255,
                [],
                'First name'
            )->addColumn(
                'last_name',
                Table::TYPE_TEXT,
                255,
                [],
                'Last name'
            )->addColumn(
                'email',
                Table::TYPE_TEXT,
                255,
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
                'Is Post Active'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT
                ],
                'Post created at'
            )->addForeignKey(
                $setup->getFkName('videh_blog_comment', 'id', 'videh_blog_post', 'id'),
                'id',
                $setup->getTable('videh_blog_post'),
                'id',
                Table::ACTION_CASCADE
            )->setComment(
                'Blog Comment Table'
            );

            $connection->createTable($table);

            $setup->endSetup();
        }

        $setup->endSetup();
    }
}
