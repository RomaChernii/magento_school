<?php
/**
 * Lebed FirstModule Price Currency ViewModel
 *
 * @category  Lebed
 * @package   Lebed/FirstModule
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\FirstModule\ViewModel;

use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class PriceCurrency
 *
 * @package Lebed\FirstModule\ViewModel
 */
class PriceCurrency implements ArgumentInterface
{
    /**
     * Price Currency
     *
     * @var PriceCurrencyInterface
     */
    protected $priceCurrency;

    /**
     * PriceCurrency constructor.
     *
     * @param PriceCurrencyInterface $priceCurrency
     */
    public function __construct(PriceCurrencyInterface $priceCurrency)
    {
        $this->priceCurrency = $priceCurrency;
    }

    /**
     * Round price
     *
     * @param float $price
     *
     * @return float
     */
    public function testViewModel($price) {
        return $this->priceCurrency->round($price);
    }
}
