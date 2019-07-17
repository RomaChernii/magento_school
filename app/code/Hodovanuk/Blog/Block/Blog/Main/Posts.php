<?php
/**
 * Blog post block
 *
 * @category  Roche
 * @package   Roche\Test
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Hodovanuk\Blog\Block\Blog\Main;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Hodovanuk\Blog\Model\ResourceModel\Post\CollectionFactory;
/**
 * Class View
 *
 * @package Roche\Blog\Block\Post
 */
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

    public function getImageUrl()
    {

    }
}