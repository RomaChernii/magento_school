<?php
/**
 * Koshyk/SecondModule/Block/Page/View
 *
 * @category Koshyk
 * @package Koshyk/SecondModule
 * @author Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\SecondModule\Block\Page;

use Magento\Framework\View\Element\Template;

/**
 * Class View
 *
 * @package Koshyk\SecondModule\Page\Page
 */
class View extends Template
{
    public function getText()
    {
        return __('Welcome to this page');
    }
}
