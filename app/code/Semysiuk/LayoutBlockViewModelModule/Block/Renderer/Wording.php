<?php

namespace Semysiuk\LayoutBlockViewModelModule\Block\Renderer;

use Magento\Framework\View\Element\Template;

class Wording extends Template
{
    public $url = "checkout/cart/index";

    public function getUrlLink()
    {
        return $this->getUrl($this->url);
    }

    public function getText()
    {
        return __("HELLO FROM FIRST WORDING BLOCK-TEMPLATE");
    }
}
