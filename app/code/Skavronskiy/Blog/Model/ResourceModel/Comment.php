<?php
/**
 * Blog comment
 *
 */
namespace Skavronskiy\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Comment
 *
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
        $this->_init('skavronskiy_blog_comment', 'id');
    }
}
