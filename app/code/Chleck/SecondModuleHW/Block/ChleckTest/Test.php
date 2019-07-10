<?php

namespace Chleck\SecondModuleHW\Block\ChleckTest;

use Magento\Catalog\Block\Product\View as MagentoView;

/**
 * Class Test
 * @package Chleck\SecondModuleHW\Block\ChleckTest
 */
class Test extends MagentoView
{
    /**
     * @return int|\Magento\Catalog\Model\Product
     */
    public function hasOptions()
    {
        return "Hi";
    }
}
