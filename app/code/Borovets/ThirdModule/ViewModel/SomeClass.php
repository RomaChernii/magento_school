<?php

namespace Borovets\ThirdModule\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class SomeClass implements ArgumentInterface
{
    public function getHelloText()
    {
        return __('Hello from ViewModel!');
    }
}
