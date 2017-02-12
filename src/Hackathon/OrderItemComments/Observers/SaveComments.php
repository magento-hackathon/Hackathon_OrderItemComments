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
    /**
     * Request instance
     *
     * @var \Magento\Framework\App\RequestInterface
     */
    protected $_request;

    protected $_logger;

    protected $_commentFactory;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\App\RequestInterface $request,
        \Hackathon\OrderItemComments\Model\CommentFactory $commentFactory
    ) {
        $this->_request = $request;
        $this->_logger = $logger;
        $this->_commentFactory = $commentFactory;
    }

    /**
     * Check post request whether it contains item comments
     *
     * @param   Observer $observer
     * @return  $this
     */
    public function execute(Observer $observer)
    {
        $itemcomments = $this->_request->getParam('itemcomments');

        $this->processItemComments($itemcomments);

        return $this;
    }

    /**
     * Process item comments - save/update them
     *
     * @param   Observer $observer
     * @return  $this
     */
    protected function processItemComments($itemcomments)
    {
        foreach ($itemcomments as $quoteItemId => $text) {
            $comment = $this->_commentFactory->create();
            $comment
                ->load($quoteItemId, 'quote_item_id')
                ->setQuoteItemId($quoteItemId)
                ->setText($text)
                ->save();
        }
    }
}
