<?php

namespace Semysiuk\BlogModule\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements  UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if(version_compare($context->getVersion(), "0.0.2", "<"))
        {
            $setup->getConnection()->addColumn(
                $setup->getTable("semysiuk_blog_post"),
                "description",
                [
                    'type' => Table::TYPE_TEXT,
                    'length' => '64k',
                    'comment' => 'Post Description'
                ]
            );
        }

        if(version_compare($context->getVersion(), "0.0.3", "<"))
        {
            $table = $setup->getConnection()->newTable(
                $setup->getTable("semysiuk_blog_comment")
            )->addColumn(
                "id",
                Table::TYPE_INTEGER,
                null,
                [
                    "identity" => true,
                    "unsigned" => true,
                    "nullable" => false,
                    "primary" => true
                ],
                "Comment id"
            )->addColumn(
                "first_name",
                Table::TYPE_TEXT,
                "20",
                [],
                "Comment first name"
            )->addColumn(
                "last_name",
                Table::TYPE_TEXT,
                "20",
                [],
                "Comment last name"
            )->addColumn(
                "email",
                Table::TYPE_TEXT,
                "30",
                [],
                "Comment email"
            )->addColumn(
                "comment",
                Table::TYPE_TEXT,
                "2M",
                [],
                "Comment comment"
            )->addColumn(
                "date",
                Table::TYPE_TIMESTAMP,
                null,
                [
                    "nullable" => false,
                    "default" => Table::TIMESTAMP_INIT
                ],
                "Comment date"
            )->addColumn(
                "status",
                Table::TYPE_SMALLINT,
                null,
                [
                    "nullable" => false,
                    "default" => "1"
                ],
                "Comment status"
            )->addColumn(
                "answer",
                Table::TYPE_TEXT,
                "2M",
                [],
                "Comment answer"
            )->addColumn(
                "post_id",
                Table::TYPE_INTEGER,
                null,
                [
                    "nullable" => false,
                    "unsigned" => true
                ],
                "Comment post id"
            )->addForeignKey(
                $setup->getFkName("semysiuk_blog_comment", "post_id", "semysiuk_blog_post", "id"),
                "post_id",
                $setup->getTable("semysiuk_blog_post"),
                "id",
                Table::ACTION_CASCADE
            )->setComment(
                "Blog comment table"
            );

            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}
