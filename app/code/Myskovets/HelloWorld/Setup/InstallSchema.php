<?php

namespace Myskovets\HelloWorld\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

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
        $installer = $setup;
        $installer->startSetup();

        if (!$installer->tableExists("myskovets_helloworld_tbl")) {
            $tbl = $installer->getConnection()->newTable($installer->getTable("myskovets_helloworld_tbl"))
                ->addColumn("id", Table::TYPE_INTEGER, null, array(
                    [
                        "identity" => true,
                        "nullable" => false,

                    ]
                ))
            ;
        }
    }
}