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
class LoadComment implements ObserverInterface
{
    /**
     * Check post request whether it contains item comments
     *
     * @param   Observer $observer
     * @return  $this
     */
    public function execute(Observer $observer)
    {
        $item = $observer->getEvent()->getItem();

        $item->setComment('This comes from the LoadComment plugin');

        return $this;
    }
}
