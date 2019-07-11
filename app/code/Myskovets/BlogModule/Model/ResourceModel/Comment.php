<?php


namespace Myskovets\BlogModule\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Comment extends AbstractDb
{
    protected function _construct()
    {
        $this->_init("myskovets_blog_comment", "id");
    }
}