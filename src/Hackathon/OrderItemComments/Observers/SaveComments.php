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
class SaveComments implements ObserverInterface
{
    var $_logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->_logger = $logger;
    }

    /**
     * Check move quote item to wishlist request
     *
     * @param   Observer $observer
     * @return  $this
     */
    public function execute(Observer $observer)
    {
        $cart = $observer->getEvent()->getCart();
        $data = $observer->getEvent()->getInfo()->toArray();

        $this->_logger->log(null, $data);

        return $this;
    }
}
