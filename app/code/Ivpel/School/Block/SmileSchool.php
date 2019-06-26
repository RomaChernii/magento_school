<?php

namespace ivpel\school\Block;

use \Magento\Framework\View\Element\Template;

/**
 * Class SmileSchool
 *
 * @package Ivpel\School\Block
 */
class SmileSchool extends Template
{
    /**
     * Get welcome text
     *
     * @return string
     */
    public function getWelcomeText()
    {
        return "Hello Vanko!";
    }
}
