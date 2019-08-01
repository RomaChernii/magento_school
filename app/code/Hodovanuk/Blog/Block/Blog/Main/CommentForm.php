<?php
namespace Hodovanuk\Blog\Block\Blog\Main;

use Magento\Framework\View\Element\Template;

/**
 * Class CommentForm
 * @package Hodovanuk\Blog\Block\Blog\Main
 */
class CommentForm extends Template
{

    /**
     * Get url action for form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('myblog/blog/commented', ['_secure' => true]);
    }

    /**
     * Get current post id
     *
     * @return int
     */
    public function getCurrentPostId()
    {
        $id = $this->getRequest()->getParams('id');
        $returnValue = $id['id'];

        return $returnValue;
    }
}
