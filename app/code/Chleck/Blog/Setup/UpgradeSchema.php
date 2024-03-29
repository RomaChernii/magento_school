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
     * @throws \Zend_Db_Exception
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

        if (version_compare($context->getVersion(), '1.0.5') < 0) {

            $table = $setup->getConnection()->newTable(
                $setup->getTable('chleck_blog_comment')
            )->addColumn(
                'post_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'unsigned' => true,
                    'nullable' => false,
                ],
                'Post_id'
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
                'Comment_id'
            )->addColumn(
                'name',
                Table::TYPE_TEXT,
                255,
                [],
                'User name'
            )->addColumn(
                'surname',
                Table::TYPE_TEXT,
                255,
                [],
                'User surname'
            )->addColumn(
                'email',
                Table::TYPE_TEXT,
                255,
                [],
                'User email'
            )->addColumn(
                'comment',
                Table::TYPE_TEXT,
                255,
                [],
                'New comment'
            )->addColumn(
                'answer',
                Table::TYPE_TEXT,
                255,
                [],
                'New answer'
            )->addForeignKey(
                $setup->getFkName(
                    'chleck_blog_comment',
                    'post_id',
                    'chleck_blog_post',
                    'id'),
                'post_id',
                $setup->getTable('chleck_blog_post'),
                'id',
                Table::ACTION_CASCADE
            )->setComment(
                'Blog Post And Comment Table'
            );

            $setup->getConnection()->createTable($table);

        }
        $setup->endSetup();
    }
}
