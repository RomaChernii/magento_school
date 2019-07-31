<?php
/**
 * BlogVideh comment collection
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Victor Dehtiarov <videh@smile.fr>
 * @copyright 2019 Smile
 */

namespace Dehtiarov\BlogVideh\Model\ResourceModel\Comment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package Dehtiarov\BlogVideh\Model\ResourceModel\Comment\Collection
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
        $this->_init('Dehtiarov\BlogVideh\Model\Comment', 'Dehtiarov\BlogVideh\Model\ResourceModel\Comment');
    }
}
