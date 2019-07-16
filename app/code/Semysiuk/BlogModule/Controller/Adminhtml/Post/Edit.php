<?php

namespace Semysiuk\BlogModule\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Semysiuk\BlogModule\Api\PostRepositoryInterface;

/**
 * Class Edit
 *
 * @package Semysiuk\BlogModule\Controller\Adminhtml\Post
 */
class Edit extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Semysiuk_BlogModule::post_save';

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
     * Post repository interface
     *
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * Edit constructor
     *
     * @param Action\Context              $context
     * @param PageFactory                 $resultPageFactory
     * @param Registry                    $registry
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        Registry $registry,
        PostRepositoryInterface $postRepository
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
        $resultPage->setActiveMenu('Semysiuk_BlogModule::posts')
            ->addBreadcrumb(__('Semysiuk'), __('Semysiuk'))
            ->addBreadcrumb(__('Manage Posts'), __('Manage Posts'));

        return $resultPage;
    }

    /**
     * Edit Post page
     *
     * @return \Magento\Backend\Model\View\Result\Page | \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $id = $this->getRequest()->getParam('id');
        $resultPage->getConfig()->getTitle()->prepend(__('Post Information'));

        if ($id) {
            try {
                $model = $this->postRepository->getById($id);
                $resultPage->getConfig()->getTitle()->prepend(__('Edit Post - %1', $model->getTitle()));

            } catch (NoSuchEntityException $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while editing the post.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
            $this->coreRegistry->register('blog_post', $model);
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Post') : __('New Post'),
            $id ? __('Edit Post') : __('New Post')
        );

        return $resultPage;
    }
}
