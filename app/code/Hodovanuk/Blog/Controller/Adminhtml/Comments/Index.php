<?php
namespace Hodovanuk\Blog\Controller\Adminhtml\Comments;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Hodovanuk\Blog\Model\CommentFactory;

/**
 * Class Index
 *
 * @package Hodovanuk\Blog\Controller\Adminhtml\Comments
 */
class Index extends Action
{
    private $_commentFactory;
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Hodovanuk_Blog::comments';

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
        PageFactory $resultPageFactory,
        CommentFactory $commentFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->_commentFactory = $commentFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Hodovanuk_Blog::post');
        $resultPage->addBreadcrumb(__('Blog Comments'), __('Blog Comments'));
        $resultPage->addBreadcrumb(__('Blog Comments'), __('Blog Comments'));
        $resultPage->getConfig()->getTitle()->prepend(__('Blog Comments'));

        return $resultPage;
    }
}
