<?php
/**
 * Blog add comment block
 */
namespace Skavronskiy\Blog\Block\Comment;

use Magento\Framework\View\Element\Template;

/**
 * Class AddComment
 *
 * @package Skavronskiy\Blog\Block\Comment
 */
class AddComment extends Template
{
    /**
     * Returns action url for add comment form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('skavronskiy_blog/blog_post/newcomment', ['_secure' => true]);
    }

    /**
     * Returns post ID
     *
     * @return int
     */
    public function getPostId()
    {
        return $this->getRequest()->getParam('id');
    }
}
