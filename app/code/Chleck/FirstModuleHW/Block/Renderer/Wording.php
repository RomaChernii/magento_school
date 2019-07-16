<?php


namespace Chleck\FirstModuleHW\Block\Renderer;

use Magento\Framework\View\Element\Template;

/**
 * Get text
 *
 * @package Chleck\test\Block\Remember
 */
class Wording extends Template
{
    /**
     * @Get text
     *
     * @return string
     */
    public function getText()
    {
        return __('Hello World');
    }
}
