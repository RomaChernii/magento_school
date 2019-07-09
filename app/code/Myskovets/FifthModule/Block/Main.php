<?php

namespace Myskovets\FifthModule\Block;

use Magento\Framework\View\Element\Template;

class Main extends Template
{
    public function getLettersArray() {
        return ['a', 'b', 'c', 'd', 'e', 'f'];
    }
}
