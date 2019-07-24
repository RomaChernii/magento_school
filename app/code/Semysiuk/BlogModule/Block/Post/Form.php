<?php

namespace Semysiuk\BlogModule\Block\Post;

use Magento\Framework\View\Element\Template;

class Form extends Template
{

//    public function __construct(Template\Context $context, array $data = [])
//    {
//        parent::__construct($context, $data);
//
//        $this->postId = $this->getRequest()->getParam("id");
//
//    }

    public function getPostId()
    {
        return $this->getRequest()->getParam("id");
    }
}
