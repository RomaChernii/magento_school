<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Skavronskiy\ThirdModuleSam\Block\Renderer;

use Magento\Framework\View\Element\Template;

class Wording extends Template
{
    public function getText()
    {
       return __('Hello World');
    }

    public function getCartUrl()
    {
        return $this->getUrl('checkout/cart');
    }
}
