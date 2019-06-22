<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Borovets\FirstModule\Block\Renderer;

use Magento\Framework\View\Element\Template;

class Wording extends Template
{
    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return __('Hello World');
    }
}
