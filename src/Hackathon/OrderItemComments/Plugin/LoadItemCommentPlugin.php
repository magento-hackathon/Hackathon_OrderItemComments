<?php

namespace Hackathon\OrderItemComments\Plugin;

use Magento\Quote\Model\Quote\Item;

class LoadItemCommentPlugin
{
    public function afterGetComment(Item $subject, $result)
    {
        /*
         * If for some reason there already is a comment field on the Item object, return that
         */
        if (! empty($result)) {
            return $result;
        }

        return 'wutwuttttt';
    }
}