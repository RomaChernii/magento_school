<?php
/**
 * Blog comment show post
 */
namespace Skavronskiy\Blog\Controller\Adminhtml\Comment;

use Magento\Backend\App\Action;
use Skavronskiy\Blog\Api\CommentRepositoryInterface;

/**
 * Class ShowPost
 *
 * @package Skavronskiy\Blog\Controller\Adminhtml\Comment
 */
class ShowPost extends Action
{
    /**
     * Comment repository interface
     *
     * @var CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * Show post constructor
     *
     * @param Action\Context          $context
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct(
        Action\Context $context,
        CommentRepositoryInterface $commentRepository
    ) {
        $this->commentRepository = $commentRepository;
        parent::__construct($context);
    }

    /**
     * Show post action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        $commentId = $this->getRequest()->getParam('id');
        $postId = $this->commentRepository->getById($commentId)->getPostId();

        return $resultRedirect->setPath('skavronskiy_blog/post/edit/', ['id' => $postId]);
    }
}
