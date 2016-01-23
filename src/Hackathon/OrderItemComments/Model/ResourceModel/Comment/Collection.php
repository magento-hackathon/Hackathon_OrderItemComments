<?php

namespace Hackathon\OrderItemComments\Model\ResourceModel\Comment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'comment_id';

    protected function _construct()
    {
        $this->_init(
            'Hackathon\OrderItemComments\Model\Comment',
            'Hackathon\OrderItemComments\Model\ResourceModel\Comment'
        );
    }

}