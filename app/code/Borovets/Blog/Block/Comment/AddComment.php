<?php
/**
 * Blog add comment block
 */
namespace Borovets\Blog\Block\Comment;

use Magento\Framework\View\Element\Template;

/**
 * Class AddComment
 *
 * @package Borovets\Blog\Block\Comment
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
        return $this->getUrl('borovets_blog/post/newcomment', ['_secure' => true]);
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
