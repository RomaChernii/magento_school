<?php

namespace Dehtiarov\FirstModule\Block\Renderer;

use Magento\Framework\View\Element\Template;

class Wording extends Template
{
    public function getText()
    {
        return __('Hello World! ))');
    }
}
