<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Borovets\SecondModule\Block\Renderer;

use http\Client\Curl\User;
use Magento\Framework\View\Element\Template;

class Wording extends Template
{
    /**
     * Get text
     *
     * @return string
     */
    public function getWelcomeText()
    {
        return __("Welcome to my online shop!");
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getFooterText()
    {
        return __('This is footer!');
    }
}
