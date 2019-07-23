<?php
/**
 * Blog posts listing block
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Block\Post;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\UrlInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class AbstractPost
 *
 * @package Koshyk\Blog\Block\Post
 */
abstract class AbstractPost extends Template
{
    /**
     * #@+
     * Config path const
     */
    const POST_IMAGE_HEIGHT = 'koshyk_blog/post_listing/image/height';
    const POST_IMAGE_WIDTH = 'koshyk_blog/post_listing/image/width';
    /**#@-*/

    /**
     * Scope config interface
     *
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * AbstractPost constructor
     *
     * @param Context              $context
     * @param ScopeConfigInterface $scopeConfig
     * @param array                $data
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
     * Get image url
     *
     * @param \Koshyk\Blog\Api\Data\PostInterface $post
     *
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
        return $this->scopeConfig->getValue(static::POST_IMAGE_HEIGHT);
    }

    /**
     * Get image width
     *
     * @return string
     */
    public function getImageWidth()
    {
        return $this->scopeConfig->getValue(static::POST_IMAGE_WIDTH);
    }
}
