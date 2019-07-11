<?php
/**
 * Blog post collection
 */
namespace Skavronskiy\Blog\Model\ResourceModel\Post;

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
        $this->_init('Skavronskiy\Blog\Model\Post', 'Skavronskiy\Blog\Model\ResourceModel\Post');
    }
}
