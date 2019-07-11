<?php


namespace Myskovets\BlogModule\Model\ResourceModel\Post;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init('Myskovets\BlogModule\Model\Post', 'Myskovets\BlogModule\Model\ResourceModel\Post');
    }
}