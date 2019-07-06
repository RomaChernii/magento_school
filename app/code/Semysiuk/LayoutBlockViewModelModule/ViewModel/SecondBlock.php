<?php

namespace Semysiuk\LayoutBlockViewModelModule\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class SecondBlock implements ArgumentInterface
{
    const TEXT = "HELLO FROM SECOND BLOCK-VIEW_MODEL";

    public function getText()
    {
        return self::TEXT;
    }
}
