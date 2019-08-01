<?php
namespace Hodovanuk\Blog\Controller\Adminhtml\Comments;

use Magento\Backend\App\Action;
use Hodovanuk\Blog\Api\CommentRepositoryInterface;

/**
 * Class Delete
 * @package Hodovanuk\Blog\Controller\Adminhtml\Comments
 */
class Delete extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Hodovanuk_Blog::comments_delete';

    /**
     * @var CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * Delete constructor.
     * @param Action\Context $context
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct(
        Action\Context              $context,
        CommentRepositoryInterface $commentRepository
    ) {
        $this->commentRepository = $commentRepository;
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
                $postRepository = $this->commentRepository;
                $postRepository->deleteById($id);
                $this->messageManager->addSuccessMessage(__('The comment has been deleted.'));

                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());

                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a comment to delete.'));

        return $resultRedirect->setPath('*/*/');
    }
}
