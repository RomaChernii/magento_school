<?php
/**
 * Blog post delete
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Dehtiarov Victor <videh@smile.fr>
 * @copyright 2019 Smile
 */
namespace Dehtiarov\BlogVideh\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Dehtiarov\BlogVideh\Api\PostRepositoryInterface;

/**
 * Class Delete
 *
 * @package Dehtiarov\BlogVideh\Controller\Adminhtml\Post
 */
class Delete extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Dehtiarov_Blogvideh::post_delete';

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
