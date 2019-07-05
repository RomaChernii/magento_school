<?php
/**
 *  Lebed Blog InstallSchema
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Class InstallSchema
 *
 * @package Lebed\Blog\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Install table lebed_blog_post
     *
     * @param SchemaSetupInterface   $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('lebed_blog_post')
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
