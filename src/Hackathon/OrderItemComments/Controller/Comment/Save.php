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
        Context $context
    ) {
        parent::__construct($context);
        $this->commentFactory = $this->_objectManager->create('\Hackathon\OrderItemComments\Model\CommentFactory');
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

        $comment = $this->commentFactory->create();

        /*$comment->setData($data);
        print_r($comment->getData());
        $comment->save();*/

    }
}