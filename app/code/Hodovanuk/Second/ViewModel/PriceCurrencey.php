<?php

namespace Hodovanuk\Second\ViewModel;

use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class PriceCurrencey
 * @package Hodovanuk\Second\ViewModel
 */
class PriceCurrencey implements ArgumentInterface
{
    /**
     * @var PriceCurrencyInterface
     */
    protected $priceCurrency;

    /**
     * PriceCurrencey constructor.
     * @param PriceCurrencyInterface $priceInterface
     */
    public function __construct(PriceCurrencyInterface $priceInterface)
    {
        $this->priceCurrency = $priceInterface;
    }

    /**
     * @return string
     */
    public function getString()
    {
        return __('This is string date');
    }
}
