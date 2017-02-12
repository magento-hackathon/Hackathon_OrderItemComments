<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Hackathon\OrderItemComments\Observers;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class CartUpdateBefore
 * @package Magento\Wishlist\Observer
 */
class LoadComments implements ObserverInterface
{
    protected $_itemCollection;

    public function __construct(
        \Hackathon\OrderItemComments\Model\ResourceModel\Comment\Collection $itemCollection
    ) {
        $this->_itemCollection = $itemCollection;
    }

    /**
     * Check post request whether it contains item comments
     *
     * @param   Observer $observer
     * @return  $this
     */
    public function execute(Observer $observer)
    {
        $quote = $observer->getQuote();

        foreach ($quote->getAllVisibleItems() as $item) {
            $comment = $this->_itemCollection
                ->addFieldToFilter('quote_item_id', $item->getId())
                ->setPageSize(1)
                ->getFirstItem();

            $item->setData('comment', $comment->getText());
        }

        return $this;
    }
}
