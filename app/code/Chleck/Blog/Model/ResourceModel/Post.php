<?php
/**
 * Blog post
 *
 * @category  Chleck
 * @package   Chleck\Blog
 * @author    Yuri Chleck <yurichleck@gmail.com>
 * @copyright 2018 Smile
 */
namespace Chleck\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Post
 * @package Chleck\Blog\Model\ResourceModel
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
        $this->_init('chleck_blog_post', 'id');
    }
}
