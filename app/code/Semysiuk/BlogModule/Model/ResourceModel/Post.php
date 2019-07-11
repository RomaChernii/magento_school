<?php

namespace Semysiuk\BlogModel\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Post
 *
 * @package Semysiuk\BlogModule\Model\ResourceModel\Post
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
        $this->_init('semysiuk_blog_post', 'id');
    }
}
