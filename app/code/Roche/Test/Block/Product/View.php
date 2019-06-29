<?php
/**
 * Roche Test category product view block
 *
 * @category  Roche
 * @package   Roche\Test
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Roche\Test\Block\Product;

use Magento\Catalog\Block\Product\View as MagentoView;

/**
 * Class View
 *
 * @package Roche\Test\Block\Product
 */
class View extends MagentoView
{
    /**
     * Get review url
     *
     * @return string
     */
    public function getReviewUrl()
    {
        $params = [
            'success' => 1
        ];

        return $this->getUrl('roche_test/index/index', $params);
    }

    /**
     * Get default qty - either as preconfigured, or as 1.
     * Also restricts it by minimal qty.
     *
     * @param null|\Magento\Catalog\Model\Product $product
     *
     * @return int
     */
    public function getProductDefaultQty($product = null)
    {
        return 123;
    }
}
