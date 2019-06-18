<?php

namespace ivpel\school\Block;

use \Magento\Framework\View\Element\Template;

/**
 * Class SmileSchool
 *
 * @package ivpel\school\Block
 */
class SmileSchool extends Template
{
    /**
     * @return string
     */
    public function getWelcomeText()
    {
        return "Hello Vanko!";
    }
}
