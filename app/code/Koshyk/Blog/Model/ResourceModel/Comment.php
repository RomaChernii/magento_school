<?php
/**
 * Blog comment
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Comment
 *
 * @package Koshyk\Blog\Model\ResourceModel\Post
 */
class Comment extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('koshyk_blog_comment', 'id');
    }
}
