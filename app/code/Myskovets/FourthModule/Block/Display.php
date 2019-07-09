<?php

namespace Myskovets\FourthModule\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Display extends Template {

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function getMyData() {
        return [
            'a' => 'b',
            'c' => 'd',
            'b' => '4',
            'd' => '5'
        ];
    }

    public function mapper($name, $value) {
        return "<tr><td>$name</td><td>$value</td></tr>";
    }
}