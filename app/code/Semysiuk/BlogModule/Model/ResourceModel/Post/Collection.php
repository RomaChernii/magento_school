<?php

namespace Semysiuk\BlogModule\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package Semysiuk\BlogModule\Model\ResourceModel\Post\Collection
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
        $this->_init('Semysiuk\BlogModule\Model\Post', 'Semysiuk\BlogModule\Model\ResourceModel\Post');
    }
}
