<?php
/**
 * Blog comment collection
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Model\ResourceModel\Comment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package Koshyk\Blog\Model\ResourceModel\Comment\Collection
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
        $this->_init('Koshyk\Blog\Model\Comment', 'Koshyk\Blog\Model\ResourceModel\Comment');
    }
}
