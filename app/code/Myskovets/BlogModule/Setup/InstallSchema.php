<?php

namespace Myskovets\HelloWorld\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    private $tableName = "myskovets_blog_post";
    private $recreateTableIfExist = false;

    /**
     * Creates the table for posts using setup interface given into the main installation function.
     * @throws \Zend_Db_Exception
     * @param SchemaSetupInterface $setup The setup interface.
     */

    private function initializeTables(SchemaSetupInterface $setup) {
        $db = $setup->getConnection();
        $table = $db->newTable($setup->getTable($this->tableName));

        // id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY
        $table->addColumn(
            "id",
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary'  => true
            ],
            'Post id'
        );

        // title VARCHAR(255)

        $table->addColumn(
            'title',
            Table::TYPE_TEXT,
            255,
            [],
            'Post title'
        );

        // image VARCHAR(255)

        $table->addColumn(
            'image',
            Table::TYPE_TEXT,
            255,
            [],
            'Post image'
        );

        // description VARCHAR(64000)

        $table->addColumn(
            'description',
            Table::TYPE_TEXT,
            '64k',
            [],
            'Post Description'
        );

        // content VARCHAR(2000000)

        $table->addColumn(
            'content',
            Table::TYPE_TEXT,
            '2M',
            [],
            'Post content'
        );

        // is_active SMALLINT NOT NULL DEFAULT 1

        $table->addColumn(
            'is_active',
            Table::TYPE_SMALLINT,
            null,
            [
                'nullable' => false,
                'default' => '1'
            ],
            'Is Post Active'
        );

        // created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP

        $table->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => Table::TIMESTAMP_INIT
            ],
            'Post created at'
        );

        // updated_at TIMESTAMP NOT NULL DEFAULT TIMESTAMP_INIT_UPDATE

        $table->addColumn(
            'update_at',
            Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => Table::TIMESTAMP_INIT_UPDATE
            ],
            'Post update at'
        );

        // COMMENT "Blog Posts Table"

        $table->setComment(
            'Blog Post Table'
        );

        $db->createTable($table);
    }


    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        // Creating the table if:
        //  1. The table does not exist
        //  2. The table exists and flag "recreateTableIfExist" is set
        // Otherwise, just do nothing.

        if (!$setup->tableExists($this->tableName)) {
            $this->initializeTables($setup);
        } else {
            if ($this->recreateTableIfExist) {
                $setup->getConnection()->dropTable($this->tableName);
                $this->initializeTables($setup);
            }
        }

        // Put your custom setup code here.

        $setup->endSetup();
    }
}