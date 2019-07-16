<?php

namespace Semysiuk\BlogModule\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Semysiuk\BlogModule\Api\PostRepositoryInterface;

/**
 * Class Delete
 *
 * @package Semysiuk\BlogModule\Controller\Adminhtml\Post
 */
class Delete extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Semysiuk_BlogModule::post_delete';

    /**
     * Post repository interface
     *
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * Delete constructor
     *
     * @param Action\Context              $context
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(
        Action\Context              $context,
        PostRepositoryInterface $postRepository
    ) {
        $this->postRepository = $postRepository;
        parent::__construct($context);
    }

    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $postRepository = $this->postRepository;
                $postRepository->deleteById($id);
                $this->messageManager->addSuccessMessage(__('The post has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a post to delete.'));

        return $resultRedirect->setPath('*/*/');
    }
}
