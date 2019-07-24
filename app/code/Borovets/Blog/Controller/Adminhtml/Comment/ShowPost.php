<?php
/**
 * Blog comment show post
 */
namespace Borovets\Blog\Controller\Adminhtml\Comment;

use Magento\Backend\App\Action;
use Borovets\Blog\Api\CommentRepositoryInterface;

/**
 * Class ShowPost
 *
 * @package Borovets\Blog\Controller\Adminhtml\Comment
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
        $postId = $this->commentRepository->getById($commentId)['post_id'];

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
        $url = $storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_WEB);

        return $resultRedirect->setPath($url.'borovets_blog/post/view/id/'.$postId);
    }
}
