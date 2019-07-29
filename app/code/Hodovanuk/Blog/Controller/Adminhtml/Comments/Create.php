<?php
namespace Hodovanuk\Blog\Controller\Adminhtml\Comments;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Hodovanuk\Blog\Api\CommentRepositoryInterface;

/**
 * Class Create
 * @package Hodovanuk\Blog\Controller\Adminhtml\Comments
 */
class Create extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Hodovanuk_Blog::comments_save';

    /**
     * Core registry
     *
     * @var Registry
     */
    private $coreRegistry;

    /**
     * Page factory
     *
     * @var PageFactory
     */
    private $resultPageFactory;

    /**
     * @var CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * Create constructor.
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     * @param Registry $registry
     * @param CommentRepositoryInterface $comRepository
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        Registry $registry,
        CommentRepositoryInterface $comRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->coreRegistry = $registry;
        $this->commentRepository = $comRepository;
        parent::__construct($context);
    }

    /**
     * Set active menu
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    private function _initAction()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Hodovanuk_Blog::comments_save')
            ->addBreadcrumb(__('Hodovanuk'), __('Hodovanuk'))
            ->addBreadcrumb(__('Create Comment'), __('Create Comment'));

        return $resultPage;
    }

    /**
     * Create action
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();

        $resultPage->getConfig()->getTitle()->prepend(__('Create comment'));
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            __('Create Comment'),
            __('Create Comment')
        );

        return $resultPage;
    }
}
