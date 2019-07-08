<?php
/**
 * Lebed ThirdHomeModule Cart Link Block
 *
 * @category  Lebed
 * @package   Lebed/ThirdHomeModule
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\ThirdHomeModule\Block\Cart;

use Magento\Framework\View\Element\Template;

/**
 * Class Link
 *
 * @package Lebed\ThirdHomeModule\Block\Cart
 */
class Link extends Template
{
    /**
     * Get link to cart page
     *
     * @return string
     */
    public function getCartLink()
    {
        return $this->getUrl('checkout/cart/index');
    }
}
