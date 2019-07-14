<?php
/**
 * Blog comment collection
 */
namespace Skavronskiy\Blog\Model\ResourceModel\Comment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
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
        $this->_init('Skavronskiy\Blog\Model\Comment', 'Skavronskiy\Blog\Model\ResourceModel\Comment');
    }
}
