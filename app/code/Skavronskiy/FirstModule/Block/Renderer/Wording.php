<?php

namespace Skavronskiy\FirstModule\Block\Renderer;

use Magento\Framework\View\Element\Template;

class Wording extends Template
{
    public function getText()
    {
       return __('Hello World!!! Do you want to go to another page?');
    }
    /**
     * Get blog url
     *
     * @return string
     */
    public function getBlogUrl()
    {
        return $this->getUrl('skavronskiy_blog/blog_post');
    }
    /**
     * Get cart url
     *
     * @return string
     */
    public function getCartUrl()
    {
        return $this->getUrl('checkout/cart');
    }
    /**
     * Get home url
     *
     * @return string
     */
    public function getHomeUrl()
    {
        return $this->getBaseUrl();
    }
}
