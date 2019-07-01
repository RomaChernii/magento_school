<?php

namespace Semysiuk\LayoutBlockViewModelModule\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class SecondBlock implements ArgumentInterface
{
    private $secondBlockName = "HELLO FROM SECOND BLOCK-VIEW_MODEL";

    public function __construct()
    {

    }

    public function getBlockName()
    {
        return $this->secondBlockName;
    }
}
