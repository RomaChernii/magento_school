<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Borovets\ThirdModule\Block\First;

use Magento\Framework\View\Element\Template;

class Index extends Template
{
    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return __('Hello World!');
    }

    public function getMyUrl()
    {
        return $this->getUrl('checkout/cart');
    }
}
