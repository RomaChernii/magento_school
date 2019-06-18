<?php
namespace Potapchuk\FirstModule\Block\Widget;

use Magento\Framework\View\Element\Template;

class Widget extends Template
{
    public function getText()
    {
        return __('Hello world');
    }
}