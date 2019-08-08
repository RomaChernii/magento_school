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

    /**
     * Get blog url
     *
     * @return string
     */
    public function getBlogUrl()
    {
        return $this->getUrl('borovets_blog/post');
    }

    /**
     * Get home page url
     *
     * @return string
     */
    public function getHomeUrl()
    {
        return $this->getBaseUrl();
    }
}
