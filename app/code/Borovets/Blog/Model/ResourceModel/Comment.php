<?php
/**
 * Blog comment resource model
 */

namespace Borovets\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Comment
 *
 * @package Borovets\Blog\Model\ResourceModel\Comment
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
        $this->_init('borovets_blog_comment', 'id');
    }
}
