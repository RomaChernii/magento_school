<?php
/**
 * Hodovanuk/FirstModule/Block/Site/SideList
 *
 * @category Hodovanuk
 * @package Hodovanuk/FirstModule
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
*/
namespace Hodovanuk\Second\Block\Site;

use Magento\Framework\View\Element\Template;

/**
 * Class SideList
 * @package Hodovanuk\Second\Block\Site
 */
class SideList extends Template
{
    /**
     * @return string
     */
    public function toDo()
    {
        return __('something');
    }

    /**
     * @var array
     */
    public $myArrValues = array('first', 'second', 'third', 'fourth');
}
