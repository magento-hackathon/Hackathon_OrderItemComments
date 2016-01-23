<?php

namespace Hackathon\OrderItemComments\Model;

use Magento\Framework\Model\AbstractModel;
use Hackathon\OrderItemComments\Api\Data\Comment as CommentInterface;

class Comment extends AbstractModel implements CommentInterface
{
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'hackathon_orderitemcomments';

    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('Hackathon\OrderItemComments\Model\ResourceModel\Comment');
    }

    public function getText()
    {
        return $this->getData(self::TEXT_COLUMN);
    }

    public function getQuoteItemId()
    {
        return $this->getData(self::QUOTE_ITEM_ID_COLUMN);
    }

    public function getOrderItemId()
    {
        return $this->getData(self::ORDER_ITEM_ID_COLUMN);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT_COLUMN);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT_COLUMN);
    }

    public function setText($text)
    {
        return $this->setData(self::TEXT_COLUMN, $text);
    }

    public function setQuoteItemId($quoteItemId)
    {
        return $this->setData(self::QUOTE_ITEM_ID_COLUMN, $quoteItemId);
    }

    public function setOrderItemId($orderItemId)
    {
        return $this->setData(self::ORDER_ITEM_ID_COLUMN, $orderItemId);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT_COLUMN, $createdAt);
    }

    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT_COLUMN, $updatedAt);
    }
}