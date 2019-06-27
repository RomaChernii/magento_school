<?php

namespace Hodovanuk\Second\ViewModel;

use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class PriceSecondary
 * @package Hodovanuk\Second\ViewModel
 */
class SecondVm implements ArgumentInterface
{
    /**
     * @return string
     */
    public function getSecondary()
    {
        return __('This is secondary');
    }
}
