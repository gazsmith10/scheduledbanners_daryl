<?php

namespace Ukpos\ScheduledBanners\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (!$setup->getConnection()->isTableExists('ukpos_scheduled_variable_set')) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable('ukpos_scheduled_variable_set')
            )
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'nullable' => false, 'primary' => true],
                    'ID'
                )
                ->addColumn(
                    'variable_set',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Variable Set'
                )
                ->addColumn(
                    'description',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => true],
                    'Description'
                )
                ->addColumn(
                    'start_time',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false],
                    'Start Time'
                )
                ->addColumn(
                    'end_time',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false],
                    'End Time'
                )
                ->addColumn(
                    'active',
                    Table::TYPE_BOOLEAN,
                    null,
                    ['nullable' => false, 'default' => 0],
                    'Active'
                )
                ->addColumn(
                    'variable_data',
                    Table::TYPE_TEXT,
                    '2M',
                    ['nullable' => true],
                    'Variable Data'
                )
                ->setComment('Scheduled Variable Set Table');

            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}
