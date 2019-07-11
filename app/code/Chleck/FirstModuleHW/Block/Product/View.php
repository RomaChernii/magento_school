<?php

namespace Chleck\FirstModuleHW\Block\Product;

use Magento\Catalog\Block\Product\View as MagentoView;

/**
 * Class View
 * @package Chleck\FirstModuleHW\Block\Product
 */
class View extends MagentoView
{
    /**
     * @param null $product
     * @return float|int
     */
    public function getProductDefaultQty($product = null)
    {
        return 12;
    }
}

