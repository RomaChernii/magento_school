<?php


namespace Myskovets\BlogModule\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init("myskovets_blog_post", "id");
    }
}