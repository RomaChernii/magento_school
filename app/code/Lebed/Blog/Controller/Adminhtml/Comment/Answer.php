<?php
/**
 * Lebed Blog Comment Answer
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Controller\Adminhtml\Comment;

use Lebed\Blog\Api\CommentRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Answer
 *
 * @package Lebed\Blog\Controller\Adminhtml\Comment
 */
class Answer extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Lebed_Blog::comment_save';

    /**
     * Page Factory
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    private $resultPageFactory;

    /**
     * Comment Repository
     *
     * @var \Lebed\Blog\Api\CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * Registry
     *
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * Answer constructor.
     *
     * @param \Magento\Backend\App\Action\Context        $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Lebed\Blog\Api\CommentRepositoryInterface $commentRepository
     * @param \Magento\Framework\Registry                $registry
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        CommentRepositoryInterface $commentRepository,
        Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->commentRepository = $commentRepository;
        $this->coreRegistry = $registry;
        parent::__construct($context);
    }

    /**
     * Answer Action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $id = $this->getRequest()->getParam('id');
        $resultPage->getConfig()->getTitle()->prepend(__('Comment Answer'));

        if ($id) {
            try {
                $model = $this->commentRepository->getById($id);
                $resultPage->getConfig()->getTitle()->prepend(__('Answer the Comment with id = %1', $model->getId()));

            } catch (NoSuchEntityException $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while editing the comment.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
            $this->coreRegistry->register('lebed_blog_comment', $model);
        }
        $resultPage->addBreadcrumb(__('Answer the Comment'), __('Answer the Comment'));

        return $resultPage;
    }
}
