<?php
/**
 * Blog comment delete
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Dehtiarov Victor <videh@smile.fr>
 * @copyright 2019 Smile
 */
namespace Dehtiarov\BlogVideh\Controller\Adminhtml\Comment;

use Dehtiarov\BlogVideh\Model\ResourceModel\Comment;
use Magento\Backend\App\Action;
use Dehtiarov\BlogVideh\Api\CommentRepositoryInterface;

/**
 * Class Delete
 *
 * @package Dehtiarov\BlogVideh\Controller\Adminhtml\Comment
 */
class Delete extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Dehtiarov_Blogvideh::comment_delete';

    /**
     * Post repository interface
     *
     * @var CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * Delete constructor
     *
     * @param Action\Context              $context
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct(
        Action\Context              $context,
        CommentRepositoryInterface $commetRepository
    ) {
        $this->commentRepository = $commetRepository;
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
                $commentRepository = $this->commentRepository;
                $commentRepository->deleteById($id);
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
