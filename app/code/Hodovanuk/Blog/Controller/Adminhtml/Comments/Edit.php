<?php
namespace Hodovanuk\Blog\Controller\Adminhtml\Comments;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Hodovanuk\Blog\Api\CommentRepositoryInterface;

/**
 * Class Edit
 * @package Hodovanuk\Blog\Controller\Adminhtml\Comments
 */
class Edit extends Action
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
    private $postRepository;

    /**
     * Edit constructor.
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     * @param Registry $registry
     * @param CommentRepositoryInterface $postRepository
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        Registry $registry,
        CommentRepositoryInterface $postRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->coreRegistry = $registry;
        $this->postRepository = $postRepository;
        parent::__construct($context);
    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    private function _initAction()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Hodovanuk_Blog::comments')
            ->addBreadcrumb(__('Hodovanuk'), __('Hodovanuk'))
            ->addBreadcrumb(__('Manage Comment'), __('Manage Comment'));

        return $resultPage;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $id = $this->getRequest()->getParam('post_id');
        $resultPage->getConfig()->getTitle()->prepend(__('Comment Information'));
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Comment') : __('New Comment'),
            $id ? __('Edit Comment') : __('New Comment')
        );

        return $resultPage;
    }
}
