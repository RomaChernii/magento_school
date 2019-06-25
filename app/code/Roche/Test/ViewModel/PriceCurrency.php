<?php
/**
 * Roche Test ViewModel price currency
 *
 * @category  Roche
 * @package   Roche\Test
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Roche\Test\ViewModel;

use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class PriceCurrency
 *
 * @package Roche\Test\ViewModel
 */
class PriceCurrency implements ArgumentInterface
{
    /**
     * Price currency.
     *
     * @var PriceCurrencyInterface
     */
    protected $priceCurrency;

    /**
     * CheckoutPrice constructor.
     *
     * @param PriceCurrencyInterface $priceCurrency
     */
    public function __construct(
        PriceCurrencyInterface $priceCurrency
    ) {
        $this->priceCurrency = $priceCurrency;
    }

    /**
     * Get checkout price
     *
     * @param $value
     *
     * @return string
     */
    public function getCheckoutPrice($value)
    {
        return $this->priceCurrency->convertAndFormat($value);
    }
}
