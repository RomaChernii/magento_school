<?php

namespace Semysiuk\BlogModule\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('semysiuk_blog_post')
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
            'Post id'
        )->addColumn(
            'title',
            Table::TYPE_TEXT,
            255,
            [],
            'Post title'
        )->addColumn(
            'image',
            Table::TYPE_TEXT,
            255,
            [],
            'Post image'
        )->addColumn(
            'content',
            Table::TYPE_TEXT,
            '2M',
            [],
            'Post content'
        )->addColumn(
            'is_active',
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
        )->addColumn(
            'update_at',
            Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => Table::TIMESTAMP_INIT_UPDATE
            ],
            'Post update at'
        )->setComment(
            'Blog Post Table'
        );

        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
