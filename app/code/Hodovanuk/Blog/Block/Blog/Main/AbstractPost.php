<?php
namespace Hodovanuk\Blog\Block\Blog\Main;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\UrlInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class AbstractPost
 *
 * @package Hodovanuk\Blog\Block\Blog\Main
 */
abstract class AbstractPost extends Template
{

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * #@+
     * Config path const
     */
    const DEMANDED_IMAGE_HEIGHT = 'hodovanuk_blog/posts_listing/image/height';
    const DEMANDED_IMAGE_WIDTH = 'hodovanuk_blog/posts_listing/image/width';
    /**#@-*/

    /**
     * AbstractPost constructor.
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     * @param array $data
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    /**
     * Create Image url
     * @param $post
     * @return string
     */
    public function getImageUrl($post)
    {
        $store = $this->_storeManager->getStore();
        $mediaUrl = $store->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);

        return $mediaUrl . $post->getImage();
    }

    /**
     * Get image height
     *
     * @return string
     */
    public function getImageHeight()
    {
        return $this->scopeConfig->getValue(static::DEMANDED_IMAGE_HEIGHT);
    }

    /**
     * Get image width
     *
     * @return string
     */
    public function getImageWidth()
    {
        return $this->scopeConfig->getValue(static::DEMANDED_IMAGE_WIDTH);
    }
}
