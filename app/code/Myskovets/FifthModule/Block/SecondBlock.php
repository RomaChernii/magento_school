<?php


namespace Myskovets\FifthModule\Block;

use Magento\Framework\View\Element\Template;


class SecondBlock extends Template
{
    public function getNumbersArray() {
        return [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    }
}