<?php


namespace Chleck\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Comment
 *
 * @package Chleck\Blog\Model\ResourceModel
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
        $this->_init('chleck_blog_comment', 'id');
    }
}
