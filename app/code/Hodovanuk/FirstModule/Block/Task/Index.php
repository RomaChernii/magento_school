<?php
/**
 * Hodovanuk/FirstModule/Block/Task/Index
 *
 * @category Hodovanuk
 * @package Hodovanuk/FirstModule
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
*/
namespace Hodovanuk\FirstModule\Block\Task;

use Magento\Framework\View\Element\Template;

class Index extends Template
{
    public function toDo()
    {
        return __('something');
    }
}
