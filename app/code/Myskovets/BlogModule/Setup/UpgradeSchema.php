<?php


namespace Myskovets\BlogModule\Setup;


use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

//        $table = $setup->getConnection()->newTable(
//            $setup->getTable('myskovets_blog_post')
//        )->addColumn(
//            'id',
//            Table::TYPE_INTEGER,
//            null,
//            [
//                'identity' => true,
//                'unsigned' => true,
//                'nullable' => false,
//                'primary' => true
//            ],
//            'Post id'
//        )->addColumn(
//            'title',
//            Table::TYPE_TEXT,
//            255,
//            [],
//            'Post title'
//        )->addColumn(
//            'image',
//            Table::TYPE_TEXT,
//            255,
//            [],
//            'Post image'
//        )->addColumn(
//            'description',
//            Table::TYPE_TEXT,
//            '64k',
//            ['nullable' => true],
//            'Post Description'
//        )->addColumn(
//            'content',
//            Table::TYPE_TEXT,
//            '2M',
//            [],
//            'Post content'
//        )->addColumn(
//            'is_active',
//            Table::TYPE_SMALLINT,
//            null,
//            [
//                'nullable' => false,
//                'default' => '1'
//            ],
//            'Is Post Active'
//        )->addColumn(
//            'created_at',
//            Table::TYPE_TIMESTAMP,
//            null,
//            [
//                'nullable' => false,
//                'default' => Table::TIMESTAMP_INIT
//            ],
//            'Post created at'
//        )->addColumn(
//            'update_at',
//            Table::TYPE_TIMESTAMP,
//            null,
//            [
//                'nullable' => false,
//                'default' => Table::TIMESTAMP_INIT_UPDATE
//            ],
//            'Post update at'
//        )->setComment(
//            'Blog Post Table'
//        );
//
//        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()->newTable($setup->getTable("myskovets_blog_comment"))->
            addColumn("id", Table::TYPE_INTEGER, null, ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true])->
            addColumn("user_first_name", Table::TYPE_TEXT, '128', [], 'Author First Name')->
            addColumn("user_last_name", Table::TYPE_TEXT, '128', [], 'Author Last Name')->
            addColumn("user_email", Table::TYPE_TEXT, '256', [], 'Author Email')->
            addColumn("comment", Table::TYPE_TEXT, '64k', [], 'Comment Text')->
            addColumn("post_id", Table::TYPE_INTEGER, null, [], 'Post ID')->
            addColumn("status", Table::TYPE_INTEGER, null, [], "Comment Status");

//        $table->addForeignKey(
//            $setup->getFkName("_blog_comment", "post_id", "_blog_post", "id"),
//            "post_id",
//            $setup->getTable("myskovets_blog_post"),
//            "id",
//            Table::ACTION_CASCADE
//        );

        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}