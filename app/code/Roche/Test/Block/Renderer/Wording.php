<?php
/**
 * Renderer wording block
 *
 * @category  Roche
 * @package   Roche\Test
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Roche\Test\Block\Renderer;

use Magento\Framework\View\Element\Template;

/**
 * Class Wording
 *
 * @package Roche\Test\Block\Renderer
 */
class Wording extends Template
{
    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return __('Hello World');
    }
}
