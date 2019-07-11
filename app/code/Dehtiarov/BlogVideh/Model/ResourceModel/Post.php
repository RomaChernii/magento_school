<?php
/**
 * BlogVideh post
 *
 * нужен для подключения базе
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Victor Dehtiarov <videh@smile.fr>
 * @copyright 2019 Smile
 */
namespace Dehtiarov\BlogVideh\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Post
 *
 * @package Dehtiarov\BlogVideh\Model\ResourceModel\Post
 */
class Post extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('videh_blog_post', 'id');
    }
}
