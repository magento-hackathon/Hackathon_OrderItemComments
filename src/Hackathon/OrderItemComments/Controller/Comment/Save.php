<?php

namespace Hackathon\OrderItemComments\Controller\Comment;

class Save extends \Magento\Framework\App\Action\Action
{

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();

        $comment = $this->_objectManager->create('Hackathon\OrderItemComments\Model\CommentFactory')->create();

        /*$comment->setData($data);
        print_r($comment->getData());
        $comment->save();*/

    }
}