<?php

namespace Semysiuk\LayoutBlockModule\Block\Renderer;

use Magento\Framework\View\Element\Template;

class Wording extends Template
{
    public function getText()
    {
        return __("Hello from renderer!");
    }
}
