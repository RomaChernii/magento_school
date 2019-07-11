<?php


namespace Myskovets\BlogModule\Controller\Adminhtml\Comment;


use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 *
 * @package Myskovets\BlogModule\Controller\Adminhtml\Comment
 */
class Index extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Myskovets_BlogModule::comment';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
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
     * @return Page
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Myskovets_BlogModule::comment');
        $resultPage->addBreadcrumb(__('Blog Comments'), __('Blog Comments'));
        $resultPage->addBreadcrumb(__('Blog Comments'), __('Blog Comments'));
        $resultPage->getConfig()->getTitle()->prepend(__('Blog Comments'));

        return $resultPage;
    }
}