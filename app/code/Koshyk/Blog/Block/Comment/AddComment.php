<?php
/**
 * Blog add comment block
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Block\Comment;

use Magento\Framework\View\Element\Template;

/**
 * Class AddComment
 *
 * @package Koshyk\Blog\Block\Comment
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
        return $this->getUrl('koshyk_blog/blog_post/addcomment', ['_secure' => true]);
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
