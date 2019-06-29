<?php
/**
 * Chleck ThirdModule Block First Index
 *
 * @category  Chleck
 * @package   Chleck\ThirdModule
 * @author    Yuri Chleck <yurichlek@gmail.com>
 * @copyright 2019 Smile
 */

namespace Chleck\ThirdModule\Block\First;

use Magento\Catalog\Block\Product\View as MagentoView;

/**
 * Class Index
 * @package Chleck\ThirdModule\Block\First
 */
class Index extends MagentoView
{
    /**
     * @return string
     */
    public function getReviewUrl()
    {
        $params = [
            'success' => 1
        ];

        return $this->getUrl('third/index/index', $params);
    }

    /**
     * @param null $product
     * @return float|int
     */
    public function getProductDefaultQty($product = null)
    {
        echo "My home work.";
    }
}
