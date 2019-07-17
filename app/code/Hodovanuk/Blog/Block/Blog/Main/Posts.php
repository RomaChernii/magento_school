<?php
namespace Hodovanuk\Blog\Block\Blog\Main;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Hodovanuk\Blog\Model\ResourceModel\Post\CollectionFactory;
use Magento\Framework\UrlInterface;

class Posts extends Template
{

    private $postFactory;

    protected $post;

    public function __construct(
        Context $context,
        CollectionFactory $posts
    ) {
        $this->postFactory = $posts;
        parent::__construct(
            $context
        );
    }

    public function getPosts()
    {
        $posts = $this->postFactory->create();
        $returnPosts = $posts->getData();

        return $returnPosts;
    }

    public function getImageUrl($post)
    {
        $store = $this->_storeManager->getStore();
        $mediaUrl = $store->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
        return $mediaUrl . $post->getImage();
    }
}