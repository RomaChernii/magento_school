<?php

/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace koshyk\FirstModule\Block\Renderer;

use Magento\Framework\View\Element\Template;

/**
 * Class Nordhing
 *
 * @package koshyk\FirstModule\Block\Renderer
 */

class Nordhing extends Template
{
    /**
     * Get text
     *
     * return string
     */
    public function getText ()
    {
        return __('Hello World');
    }
}
