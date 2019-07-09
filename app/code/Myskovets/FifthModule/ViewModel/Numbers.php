<?php

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Numbers implements ArgumentInterface {

    public function getNumbers() {
        return [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10
        ];
    }
}