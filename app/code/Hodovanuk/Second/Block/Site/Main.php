<?php
/**
 * Hodovanuk/FirstModule/Block/Task/Index
 *
 * @category Hodovanuk
 * @package Hodovanuk/FirstModule
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
*/
namespace Hodovanuk\Second\Block\Site;

use Magento\Framework\View\Element\Template;

class Main extends Template
{
    public function toDo()
    {
        return __('something');
    }
}
