<?php
/**
 * Chleck ThirdModule Block Second Index
 *
 * @category  Chleck
 * @package   Chleck\ThirdModule
 * @author    Yuri Chleck <yurichlek@gmail.com>
 */

namespace Chleck\ThirdModule\Block\Second;

use Magento\Framework\View\Element\Template;

/**
 * Class Index
 * @package Chleck\ThirdModule\Block\Second
 */
class Index extends Template
{
    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return "Hi it is magento module:)";
    }
}
