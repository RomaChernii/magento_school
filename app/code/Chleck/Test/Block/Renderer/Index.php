<?php

namespace Chleck\Test\Block\Renderer;

use Magento\Framework\View\Element\Template;

/**
 * Class Index
 * @package Chleck\Test\Block\Renderer
 */
class Index extends Template
{
    /**
     * @return string
     */
    public function getWelcomeText()
    {
        return 'Hello World';
    }
}
