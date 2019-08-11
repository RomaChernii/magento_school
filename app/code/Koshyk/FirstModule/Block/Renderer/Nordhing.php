<?php
/**
 * Koshyk/FirstModule/Block/Renderer/Nordhing
 *
 * @category Koshyk
 * @package Koshyk/FirstModule
 * @author Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\FirstModule\Block\Renderer;

use Magento\Framework\View\Element\Template;

/**
 * Class Nordhing
 *
 * @package Koshyk\FirstModule\Block\Renderer
 */
class Nordhing extends Template
{
    /**
     * Get page url
     *
     * @return string
     */
    public function getPageUrl()
    {
        return $this->getUrl('koshyk_blog/blog_post');
    }

    /**
     * Get page url
     *
     * @return string
     */
    public function getAdminMenuUrl()
    {
        return $this->getUrl('admin');
    }

    /**
     * Get text
     *
     * return string
     */
    public function getText()
    {
        return __('Hello World');
    }
}
