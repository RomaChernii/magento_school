<?php
namespace Hodovanuk\Blog\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package Hodovanuk\Blog\Model\ResourceModel\Post\Collection
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
        $this->_init('Hodovanuk\Blog\Model\Post', 'Hodovanuk\Blog\Model\ResourceModel\Post');
    }
}
