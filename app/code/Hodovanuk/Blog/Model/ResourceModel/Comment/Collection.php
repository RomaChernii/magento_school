<?php
namespace Hodovanuk\Blog\Model\ResourceModel\Comment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package Hodovanuk\Blog\Model\ResourceModel\Comment\Collection
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
        $this->_init('Hodovanuk\Blog\Model\Comment', 'Hodovanuk\Blog\Model\ResoursceModel\Comment');
    }
}
