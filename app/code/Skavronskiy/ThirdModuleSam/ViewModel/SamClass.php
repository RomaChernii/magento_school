<?php

namespace Skavronskiy\ThirdModuleSam\ViewModel;

use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class SamClass implements ArgumentInterface
{
    public function getText()
    {
        return __("Hello");
    }
}
