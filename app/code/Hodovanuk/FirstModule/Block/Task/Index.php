<?php

namespace Hodovanuk\FirstModule\Block\Task;

use Magento\Framework\View\Element\Template;

class Index extends Template
{
    public function toDo()
    {
        return __("something");
    }
}
