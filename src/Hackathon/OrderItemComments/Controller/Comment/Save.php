<?php

namespace Hackathon\OrderItemComments\Controller\Comment;

use Magento\Framework\App\Action\Context;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Hackathon\OrderItemComments\Model\CommentFactory
     */
    protected $commentFactory;

    public function __construct(
        Context $context,
        \Hackathon\OrderItemComments\Model\CommentFactory $commentFactory
    ) {
        parent::__construct($context);
        $this->commentFactory = $commentFactory;
    }

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();

        $comment = $this->_commentFactory->create();
        $comment
            ->setQuoteItemId($data['quote_item_id'])
            ->setText($data['text'])
            ->save();

    }
}