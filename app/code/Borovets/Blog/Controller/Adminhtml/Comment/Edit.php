<?php
/**
 * Blog comment edit
 */

namespace Borovets\Blog\Controller\Adminhtml\Comment;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Borovets\Blog\Api\CommentRepositoryInterface;

/**
 * Class Edit
 *
 * @package Borovets\Blog\Controller\Adminhtml\Comment
 */
class Edit extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Borovets_Blog::comment_save';

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
     * Comment repository interface
     *
     * @var CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * Edit constructor
     *
     * @param Action\Context              $context
     * @param PageFactory                 $resultPageFactory
     * @param Registry                    $registry
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        Registry $registry,
        CommentRepositoryInterface $commentRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->coreRegistry = $registry;
        $this->commentRepository = $commentRepository;
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
        $resultPage->setActiveMenu('Borovets_Blog::comments')
            ->addBreadcrumb(__('Borovets'), __('Borovets'))
            ->addBreadcrumb(__('Manage Comments'), __('Manage Comments'));

        return $resultPage;
    }

    /**
     * Edit Comment page
     *
     * @return \Magento\Backend\Model\View\Result\Page | \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $id = $this->getRequest()->getParam('id');
        $resultPage->getConfig()->getTitle()->prepend(__('Comment Information'));

        if ($id) {
            try {
                $model = $this->commentRepository->getById($id);
                $resultPage->getConfig()->getTitle()->prepend(__('Edit Comment'));
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
            $id ? __('Edit Comment') : __('New Comment'),
            $id ? __('Edit Comment') : __('New Comment')
        );

        return $resultPage;
    }
}
