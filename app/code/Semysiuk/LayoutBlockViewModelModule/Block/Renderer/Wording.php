<?php

namespace Semysiuk\LayoutBlockViewModelModule\Block\Renderer;

use Magento\Framework\View\Element\Template;

class Wording extends Template
{
    const CHECKOUT_CART_URL = "checkout/cart/index";
    const TEXT = "HELLO FROM FIRST WORDING BLOCK-TEMPLATE";

    public function getUrlLink()
    {
        return $this->getUrl(self::CHECKOUT_CART_URL);
    }

    public function getText()
    {
        return self::TEXT;
    }
}
