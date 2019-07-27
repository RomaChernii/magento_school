<?php
/**
 * Blog post collection
 */

namespace Borovets\Blog\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package Borovets\Blog\Model\ResourceModel\Post\Collection
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
        $this->_init('Borovets\Blog\Model\Post', 'Borovets\Blog\Model\ResourceModel\Post');
    }
}
