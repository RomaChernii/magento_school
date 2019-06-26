<?php
/**
 * Hodovanuk/FirstModule/Block/Site/SideList
 *
 * @category Hodovanuk
 * @package Hodovanuk/FirstModule
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
 */
namespace Hodovanuk\Third\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class SideList
 * @package Hodovanuk\Second\Block\Site
 */
class Arrival extends Template
{
    /**
     * @return string
     */
    public $urlToCart = 'http://localhost/magento_school/checkout/cart/';
}
