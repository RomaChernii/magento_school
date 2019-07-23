<?php

namespace Semysiuk\BlogModule\Block\Post;

use Magento\Framework\View\Element\Template;

class Form extends Template
{
    protected $postId;

    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);

        $this->postId = $this->getRequest()->getParam("id");

    }

    public function getPostId()
    {
        //var_dump($this->postId);
        return $this->postId[0];
    }
}
