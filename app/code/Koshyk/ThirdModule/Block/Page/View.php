<?php
/**
 * Koshyk/ThirdModule/Block/Page/View
 *
 * @category Koshyk
 * @package Koshyk/ThirdModule
 * @author Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\ThirdModule\Block\Page;

use Magento\Framework\View\Element\Template;

/**
 * Class View
 *
 * @package Koshyk\ThirdModule\Page\Page
 */
class View extends Template
{
    public function getText()
    {
        return ('Welcome to this page');
    }

    public function getReviewUrl()
    {
        return $this->getUrl('checkout\cart');
    }
}
