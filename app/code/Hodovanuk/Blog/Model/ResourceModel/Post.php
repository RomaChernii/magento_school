<?php
namespace Hodovanuk\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Post
 *
 * @package Hodovanuk\Blog\Model\ResourceModel\Post
 */
class Post extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('hodovanuk_blog_post', 'id');
    }
}
