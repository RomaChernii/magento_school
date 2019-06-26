<?php

namespace Hodovanuk\Third\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class PriceSecondary
 * @package Hodovanuk\Second\ViewModel
 */
class ArrivalView implements ArgumentInterface
{
    /**
     * @return string
     */
    public function getText()
    {
        return __('Click on the button to go to the Card page');
    }
}
