<?php
/**
 * Set url variable
 *
 * @category Hodovanuk
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
 */

namespace Hodovanuk\Third\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class Arrival
 * @package Hodovanuk\Third\Block
 */
class Arrival extends Template
{
    /**
     * Contain url
     * @var string
     */
    public $urlToCart = 'http://localhost/magento_school/checkout/cart/';
}
