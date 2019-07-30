<?php
/**
 * Blog comment collection
 */

namespace Borovets\Blog\Model\ResourceModel\Comment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package Borovets\Blog\Model\ResourceModel\Comment\Collection
 *
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
        $this->_init('Borovets\Blog\Model\Comment', 'Borovets\Blog\Model\ResourceModel\Comment');
    }
}
