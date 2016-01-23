<?php

namespace Hackathon\OrderItemComments\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    const TABLE_NAME = 'hackathon_orderitemcomments_comment';

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable(self::TABLE_NAME)
        )->addColumn(
            'comment_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Comment id'
        )->addColumn(
            'quote_item_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['unsigned' => true, 'nullable' => true],
            'Reference to quote item if applicable'
        )->addColumn(
            'order_item_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['unsigned' => true, 'nullable' => true],
            'Reference to order item if applicable'
        )->addColumn(
            'text',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'Comment text'
        )->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
            'Created At'
        )->addColumn(
            'updated_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
            'Updated At'
        )->setComment(
            'Adminnotification Inbox'
        )->addForeignKey(
            $setup->getFkName(self::TABLE_NAME, 'quote_item_id', 'quote_item', 'item_id'),
            'quote_item_id',
            $setup->getTable('quote_item'),
            'item_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->addForeignKey(
            $setup->getFkName(self::TABLE_NAME, 'order_item_id', 'sales_order_item', 'item_id'),
            'order_item_id',
            $setup->getTable('sales_order_item'),
            'item_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );

        $setup->getConnection()->createTable($table);
    }
}