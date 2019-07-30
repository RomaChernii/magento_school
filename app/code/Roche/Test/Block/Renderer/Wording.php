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
        return __('Do you want to go to another page?');
    }

    /**
     * Get page url
     *
     * @return string
     */
    public function getPageUrl()
    {
        return $this->getUrl('roche_test');
    }

    /**
     * Get cart url
     *
     * @return string
     */
    public function getCartUrl()
    {
        return $this->getUrl('checkout/cart');
    }

    /**
     * Get home url
     *
     * @return string
     */
    public function getHomeUrl()
    {
        return $this->getBaseUrl();
    }
}
