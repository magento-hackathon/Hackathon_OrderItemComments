<?php

namespace Hackathon\OrderItemComments\Api\Data;

interface Comment
{
    const TEXT_COLUMN = 'text';
    const QUOTE_ITEM_ID_COLUMN = 'quote_item_id';
    const ORDER_ITEM_ID_COLUMN = 'order_item_id';
    const CREATED_AT_COLUMN = 'created_at';
    const UPDATED_AT_COLUMN = 'updated_at';

    public function getId();

    public function getText();

    public function getQuoteItemId();

    public function getOrderItemId();

    public function getCreatedAt();

    public function getUpdatedAt();

    public function setId($id);

    public function setText($text);

    public function setQuoteItemId($quoteItemId);

    public function setOrderItemId($orderItemId);

    public function setCreatedAt($createdAt);

    public function setUpdatedAt($updatedAt);

}