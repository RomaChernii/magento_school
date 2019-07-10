<?php

namespace Chleck\Blog\Model\ResourceModel\Comment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Chleck\Blog\Model\ResourceModel\Post
 */
class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Chleck\Blog\Model\Comment', 'Chleck\Blog\Model\ResourceModel\Comment');
    }
}
