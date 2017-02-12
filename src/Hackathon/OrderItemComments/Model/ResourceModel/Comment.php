<?php

namespace Hackathon\OrderItemComments\Model\ResourceModel;

use Hackathon\OrderItemComments\Api\Data\Comment as CommentInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Comment extends AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('hackathon_orderitemcomments_comment', 'comment_id');
    }

    /**
     * Perform actions before object save
     *
     * @param \Magento\Framework\Model\AbstractModel $object
     * @return $this
     */
    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
    {
        $belongsToQuoteItem = $object->getData(CommentInterface::QUOTE_ITEM_ID_COLUMN);
        $belongsToOrderItem = $object->getData(CommentInterface::ORDER_ITEM_ID_COLUMN);
        $hasText = $object->getData(CommentInterface::TEXT_COLUMN);

        // A comment should either be attached to a quote item or order item...
        if (! $belongsToQuoteItem && ! $belongsToOrderItem) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('A comment should belong to either a quote item or order item.')
            );
        }

        // ...but not to both
        if ($belongsToQuoteItem && $belongsToOrderItem) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('A comment cannot belong to both a quote item and order item.')
            );
        }

        if (! $hasText) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('A comment requires some text.')
            );
        }


        return parent::_beforeSave($object);
    }
}

