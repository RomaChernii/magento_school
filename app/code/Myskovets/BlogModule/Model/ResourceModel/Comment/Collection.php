<?php


namespace Myskovets\BlogModule\Model\ResourceModel\Comment;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init('Myskovets\BlogModule\Model\Comment', 'Myskovets\BlogModule\Model\ResourceModel\Comment');
    }
}