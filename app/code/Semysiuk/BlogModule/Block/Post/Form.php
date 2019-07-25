<?php

namespace Semysiuk\BlogModule\Block\Post;

use Magento\Framework\View\Element\Template;

class Form extends Template
{
    const FORM_URL = "semysiuk_blogmodule/blog_comment/index";

    public function getPostId()
    {
        return $this->getRequest()->getParam("id");
    }

    public function getFormUrlLink()
    {
        return $this->getUrl(static ::FORM_URL);
    }
}
