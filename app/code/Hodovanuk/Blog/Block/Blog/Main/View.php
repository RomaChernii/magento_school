<?php
namespace Hodovanuk\Blog\Block\Blog\Main;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Hodovanuk\Blog\Api\PostRepositoryInterface;
use Hodovanuk\Blog\Api\CommentRepositoryInterface;
use Hodovanuk\Blog\Model\ResourceModel\Comment\CollectionFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Message\ManagerInterface;
use Hodovanuk\Blog\Model\Comment;
use Hodovanuk\Blog\Api\Data\CommentInterface;
use Hodovanuk\Blog\Model\ResourceModel\Comment\Collection as CommentsCollection;

/**
 * Class View
 * @package Hodovanuk\Blog\Block\Blog\Main
 */
class View extends AbstractPost
{
    /**
     * #@+
     * Config path const
     */
    const DEMANDED_IMAGE_HEIGHT = 'hodovanuk_blog/post_view/image/height';
    const DEMANDED_IMAGE_WIDTH = 'hodovanuk_blog/post_view/image/width';
    /**#@-*/

    /**
     * @var PostRepositoryInterface
     */
    protected $postRepository;

    /**
     * @var CommentRepositoryInterface
     */
    protected $commentRepository;

    /**
     * @var PostRepositoryInterface
     */
    protected $post;

    /**
     * @var Comment
     */
    protected $commentModel;

    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * @var CollectionFactory
     */
    private $commentCollection;

    /**
     * View constructor.
     * @param Context $context
     * @param PostRepositoryInterface $postRepository
     * @param CommentRepositoryInterface $comRepository
     * @param ScopeConfigInterface $scopeConfig
     * @param ManagerInterface $messageManager
     * @param CollectionFactory $comment
     * @param array $data
     */
    public function __construct(
        Context $context,
        PostRepositoryInterface $postRepository,
        CommentRepositoryInterface $comRepository,
        ScopeConfigInterface $scopeConfig,
        ManagerInterface $messageManager,
        CollectionFactory $comment,
        Comment $cmModel,
        array $data = []
    ) {
        $this->postRepository = $postRepository;
        $this->commentRepository = $comRepository;
        $this->messageManager = $messageManager;
        $this->commentCollection = $comment;
        $this->commentModel = $cmModel;
        parent::__construct(
            $context,
            $scopeConfig,
            $data
        );
    }

    /**
     * Set post title
     *
     * @return $this|AbstractPost
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__($this->getPost()->getTitle()));
        return $this;
    }

    /**
     * Get post by id
     *
     * @return mixed
     */
    public function getPost()
    {
        if ($this->post == null) {
            try {
                $postId = $this->getRequest()->getParam('id');
                if ($postId) {
                    $this->post = $this->postRepository->getById($postId);
                }
            } catch (NoSuchEntityException $error) {
                $this->messageManager->addErrorMessage($error->getMessage());
            }
        }
        return $this->post;
    }

    /**
     * Ge comments by post_id
     *
     * @return mixed
     */
    public function getComment()
    {
        $id = $this->getRequest()->getParam('id');

        $returnComments = $this->commentRepository->getByPostId($id);
        $returnComments->addOrder(
            CommentInterface::CREATE_DATA,
            CommentsCollection::SORT_ORDER_ASC
        );

        return $returnComments;
    }

    /**
     * @param $status
     *
     * @return comment status
     */
    public function getCommentStatus($status)
    {
        $availableOptions = $this->commentModel->getAnswerStatuses();

        return $availableOptions[$status];
    }
}
