<?php

namespace Borovets\FirstModule\Block\Product;

use Magento\Catalog\Block\Product\View as MagentoView;

class View extends MagentoView
{
    public function getProductDefaultQty($product = null)
    {
        return 12;
    }
}
