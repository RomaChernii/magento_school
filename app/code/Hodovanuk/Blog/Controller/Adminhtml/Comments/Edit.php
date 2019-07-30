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
    const ADMIN_RESOURCE = 'Hodovanuk_Blog::comments_answer';

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
     * Edit constructor.
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
     *  Set active menu
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    private function _initAction()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Hodovanuk_Blog::comments');
        $resultPage->addBreadcrumb(__('Blog Comments'), __('Blog Comments'));
        $resultPage->addBreadcrumb(__('Blog Comments'), __('Blog Comments'));

        return $resultPage;
    }

    /**
     * Edit action
     *
     * Set title by current comment title
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $id = $this->getRequest()->getParam('id');

        if ($id) {
            try {
                $model = $this->commentRepository->getById($id);
                $resultPage->getConfig()->getTitle()->prepend(__('Answer Comment - %1', $model->getTitle()));

            } catch (NoSuchEntityException $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while editing the comment.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
            $this->coreRegistry->register('blog_comment', $model);
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            __('Answer Comment'),
            __('Answer Comment')
        );

        return $resultPage;
    }
}
