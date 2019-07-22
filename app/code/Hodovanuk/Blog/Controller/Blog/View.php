<?php
/**
 * View action
 *
 * @category Hodovanuk
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
 */

namespace Hodovanuk\Blog\Controller\Blog;

use Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

/**
 * Class View
 * @package Hodovanuk\Blog\Controller\Blog
 */
class View extends Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * View constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;

        return parent::__construct($context);
    }

    /**
     * View page action
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $returnFactory = $this->_pageFactory->create();

        return $returnFactory;
    }
}
