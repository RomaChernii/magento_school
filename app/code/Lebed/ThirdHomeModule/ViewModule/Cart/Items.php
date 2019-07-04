<?php
/**
 * Lebed ThirdHomeModule Cart Link Block
 *
 * @category  Lebed
 * @package   Lebed/ThirdHomeModule
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */

namespace Lebed\ThirdHomeModule\ViewModule\Cart;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Checkout\Helper\Cart as CartHelper;

/**
 * Class Items
 *
 * @package Lebed\ThirdHomeModule\ViewModule\Cart
 */
class Items implements ArgumentInterface
{
    /**
     * Checkout Cart Helper
     *
     * @var \Magento\Checkout\Helper\Cart
     */
    protected $_cartHelper;

    /**
     * Items constructor.
     *
     * @param \Magento\Checkout\Helper\Cart $cartHelper
     */
    public function __construct(CartHelper $cartHelper)
    {
        $this->_cartHelper = $cartHelper;
    }

    /**
     * Get cart Items quantity
     *
     * @return float|int
     */
    public function getCartItemsQty()
    {
        return $this->_cartHelper->getItemsQty();
    }

    /**
     * Get Info about cart items quantity
     *
     * @return string
     */
    public function getCartInfo() {
        $cartInfo = __('Your cart is empty');
        $qty = $this->getCartItemsQty();
        if ($qty) {
            $cartInfo = __('You have %1 item(s) quantity in your cart', $qty);
        }

        return $cartInfo;
    }
}
