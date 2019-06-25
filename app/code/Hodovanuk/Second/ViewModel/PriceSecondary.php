<?php

namespace Hodovanuk\Second\ViewModel;

use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class PriceSecondary
 * @package Hodovanuk\Second\ViewModel
 */
class PriceSecondary implements ArgumentInterface
{
    /**
     * @var PriceCurrencyInterface
     */
    protected $priceCurrency;

    /**
     * PriceSecondary constructor.
     * @param PriceCurrencyInterface $priceInterface
     */
    public function __construct(PriceCurrencyInterface $priceInterface)
    {
        $this->priceCurrency = $priceInterface;
    }

    /**
     * @return string
     */
    public function getSecondary()
    {
        return __('This is secondary');
    }
}
