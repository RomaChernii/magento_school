<?php

namespace Semysiuk\BlogModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Comment
 *
 * @package Semysiuk\BlogModule\Model\ResourceModel\Comment
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
        $this->_init('semysiuk_blog_comment', 'id');
    }
}

