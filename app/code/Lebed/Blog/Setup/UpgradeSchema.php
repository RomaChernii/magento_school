<?php
/**
 *  Lebed Blog UpgradeSchema
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */

namespace Lebed\Blog\Setup;

use Lebed\Blog\Setup\InstallSchema;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Class UpgradeSchema
 *
 * @package Lebed\Blog\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Upgrade table lebed_blog_post
     *
     * @param \Magento\Framework\Setup\SchemaSetupInterface   $setup
     * @param \Magento\Framework\Setup\ModuleContextInterface $context
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '0.0.2', '<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable(InstallSchema::BLOG_POST_TABLE_NAME),
                'description',
                [
                    'type'    => Table::TYPE_TEXT,
                    'size'    => '64k',
                    'comment' => 'Post Description',
                ]
            );
        }

        if (version_compare($context->getVersion(), '0.0.3', '<')) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable(InstallSchema::BLOG_COMMENT_TABLE_NAME)
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
                [
                    'unsigned' => true,
                    'nullable' => false,
                ],
                'Post id'
            )->addColumn(
                'first_name',
                Table::TYPE_TEXT,
                255,
                [],
                'Author First name'
            )->addColumn(
                'last_name',
                Table::TYPE_TEXT,
                255,
                [],
                'Author Last Name'
            )->addColumn(
                'email',
                Table::TYPE_TEXT,
                255,
                [],
                'Author E-mail'
            )->addColumn(
                'comment',
                Table::TYPE_TEXT,
                '64k',
                [],
                'Comment Text'
            )->addColumn(
                'answer',
                Table::TYPE_TEXT,
                '64k',
                [],
                'Comment Answer'
            )->addColumn(
                'status',
                Table::TYPE_TEXT,
                32,
                [
                    'nullable' => false,
                    'default' => 'new'
                ],
                'Comment Status'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT
                ],
                'Comment created at'
            )->addForeignKey(
                $setup->getFkName(
                    InstallSchema::BLOG_COMMENT_TABLE_NAME,
                    'post_id',
                    InstallSchema::BLOG_POST_TABLE_NAME,
                    'id'),
                'post_id',
                $setup->getTable(InstallSchema::BLOG_POST_TABLE_NAME),
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
