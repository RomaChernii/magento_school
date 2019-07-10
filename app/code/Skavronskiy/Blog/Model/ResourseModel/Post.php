<?php
/**
 * Blog post
 *
 */
namespace Skavronskiy\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Post
 *
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
        $this->_init('skavronskiy_blog_post', 'id');
    }
}
