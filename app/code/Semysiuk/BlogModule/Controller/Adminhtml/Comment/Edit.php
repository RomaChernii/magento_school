<?php

namespace Semysiuk\BlogModule\Controller\Adminhtml\Comment;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Semysiuk\BlogModule\Api\CommentRepositoryInterface;

/**
 * Class Edit
 *
 * @package Semysiuk\BlogModule\Controller\Adminhtml\Comment
 */
class Edit extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Semysiuk_BlogModule::comment_edit';

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
     * Preview constructor
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
        $resultPage->setActiveMenu('Semysiuk_BlogModule::comment_edit')
            ->addBreadcrumb(__('Manage Comment'), __('Manage Comment'))
            ->addBreadcrumb(__('Manage Comment'), __('Manage Comment'));

        return $resultPage;
    }

    /**
     * Preview Comment page
     *
     * @return \Magento\Backend\Model\View\Result\Page | \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $id = $this->getRequest()->getParam('id');

        if ($id) {
            try {
                $model = $this->commentRepository->getById($id);

                $resultPage->getConfig()->getTitle()->prepend(__('Preview Comment - %1', $model->getFirstName() . $model->getLastName()));

            } catch (NoSuchEntityException $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while editing the comment.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }

        return $resultPage;
    }
}
