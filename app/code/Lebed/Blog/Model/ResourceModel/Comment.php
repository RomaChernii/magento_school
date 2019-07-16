<?php
/**
 * Lebed Blog Comment ResourceModel
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Comment
 *
 * @package Lebed\Blog\Model\ResourceModel
 */
class Comment extends AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('lebed_blog_comment', 'id');
    }
}
