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

class SideList extends Template
{
    public function toDo()
    {
        return __('something');
    }

    public $myArrValues = array('first', 'second', 'third', 'fourth');
}
