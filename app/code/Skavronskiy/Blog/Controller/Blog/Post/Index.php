<?php
/**
 * Skavronskiy Blog controller post index
 *
 */
namespace Skavronskiy\Blog\Controller\Blog\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

/**
 * Class Index
 *
 * @package Skavronskiy\Blog\Controller\Blog\Post
 */
class Index extends Action
{
    /**
     * Page factory
     *
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Index constructor
     *
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();

        return $resultPage;
    }
}
