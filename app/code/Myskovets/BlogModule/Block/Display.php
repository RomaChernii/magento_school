<?php
namespace Myskovets\BlogModule\Block;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Display extends Template
{

    protected $_postFactory;

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function anyBlogsExist() {
        return false;
    }
}
