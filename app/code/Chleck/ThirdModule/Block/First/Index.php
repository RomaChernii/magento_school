<?php
/**
 * Chleck ThirdModule Block First Index
 *
 * @category  Chleck
 * @package   Chleck\ThirdModule
 * @author    Yuri Chleck <yurichlek@gmail.com>
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

        return "Url is: " . $this->getUrl('third/index/index', $params);
    }
}
