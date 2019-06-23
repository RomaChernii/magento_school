<?php
/**
 * Koshyk/FirstModule/Block/Product/View
 *
 * @category Koshyk
 * @package Koshyk/FirstModule
 * @author Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\FirstModule\Block\Product;

use Magento\Catalog\Block\Product\View as MagentoView;

/**
 * Class View
 *
 * @package Koshyk\FirstModule\Block\Product
 */
class View extends MagentoView
{
    public function getProductDefaultQty($product = null)
    {
        return 15;
    }
}
