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
       // $setup->endSetup();

        if (version_compare($context->getVersion(), '1.0.2') < 0){

        $table = $setup->getConnection()->newTable(
            $setup->getTable('chleck_blog_post')
        )->addColumn(
            'Comment id',
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
            Table::TYPE_TEXT,
            255,
            [],
            'Post id'
        )->addColumn(
            'Name',
            Table::TYPE_TEXT,
            255,
            [],
            'User name'
        )->addColumn(
            'Surname',
            Table::TYPE_TEXT,
            255,
            [],
            'User surname'
        )->addColumn(
            'Email',
            Table::TYPE_TEXT,
            255,
            [],
            'User email'
        )->addColumn(
            'Comment',
            Table::TYPE_TEXT,
            255,
            [],
            'New comment'
        )->addColumn(
            'Answer',
            Table::TYPE_TEXT,
            255,
            [],
            'New answer'
        )->setComment(
            'Blog Post And Comment Table'
        );

        $setup->getConnection()->createTable($table);

    }
        $setup->endSetup();
    }
}
