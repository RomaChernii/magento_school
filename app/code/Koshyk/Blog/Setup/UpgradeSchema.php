<?php
namespace Koshyk\Blog\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $connection = $setup->getConnection();

        $installer->startSetup();

        if (version_compare($context->getVersion(), '0.0.3', '<')) {
            $connection->addColumn(
                $installer->getTable('koshyk_blog_post'),
                'description',
               [
                    'type' => Table::TYPE_TEXT,
                    'size' => '64k',
                    'comment' => 'Post Description'
               ]
            );
        }

        if((version_compare($context->getVersion(), '0.0.4') < 0) ){
            $table = $connection->newTable(
                $installer->getTable('koshyk_blog_comment')
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
                'date',
                Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT
                ],
                'Comment created at'
            )->addColumn(
                'email',
                Table::TYPE_TEXT,
                255,
                [],
                'Creator email'
            )->addColumn(
                'comment',
                Table::TYPE_TEXT,
                '2M',
                [],
                'Creator comment'
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
                'post_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'unsigned' => true,
                    'nullable' => false
                ],
                'post foreignkey'
            )->addForeignKey(
                $installer->getFkName(
                    'koshyk_blog_comment',
                    'post_id',
                    'koshyk_blog_post',
                    'id'),
                'post_id',
                $installer->getTable('koshyk_blog_post'),
                'id',
                Table::ACTION_CASCADE
            )->setComment(
                'Blog Comment Table'
            );
            $installer->getConnection()
                ->createTable($table);
        }

        if (version_compare($context->getVersion(), '0.0.6', '<')) {
            $connection->changeColumn(
                $installer->getTable('koshyk_blog_comment'),
                'answer',
                'status',
                [
                    'type' => Table::TYPE_SMALLINT,
                    'size' => null,
                    'nullable' => false,
                    'default' => '1'
                ]
            );
            $connection->addColumn(
                $installer->getTable('koshyk_blog_comment'),
                'answer',
                [
                    'type' => Table::TYPE_TEXT,
                    'size' => '2M',
                    'comment' =>  'Answer'
                ]
            );
        }
        $installer->endSetup();
    }
}
