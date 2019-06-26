<?php


namespace Chleck\SecondModuleHW\Block\Product;
use Magento\Catalog\Block\Product\View as MagentoView;

/*use Magento\Framework\View\Element\Template;*/
/**
 * Class Price
 * @package Chleck\SecondModuleHW\Block\Product
 */

class View extends MagentoView
{
    /**
     * @return int|\Magento\Catalog\Model\Product
     */

    public function getProduct()
    {
        return "Hi";
    }
}
