<?php

namespace Hodovanuk\Second\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class PriceCurrencey
 * @package Hodovanuk\Second\ViewModel
 */
class PriceCurrencey implements ArgumentInterface
{
    /**
     * @return string
     */
    public function getString()
    {
        return __('This is string date');
    }
}
