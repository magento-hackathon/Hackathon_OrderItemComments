<?php

namespace Hackathon\OrderItemComments\Model\ResourceModel;

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
}

