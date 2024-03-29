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
     * @return $this|AbstractPost
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__($this->getPost()->getTitle()));
        if ($this->getComment()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'blog.post.listing.pager'
            )->setCollection(
                $this->getComment()
            );
            $this->setChild('pager', $pager);
            $this->getComment()->load();
        }

        return $this;
    }

    /**
     * Get child template pager
     *
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    /**
     * Get post by id
     *
     * @return PostRepositoryInterface
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
     * @return object CommentRepositoryInterface
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
     * Get comment status
     *
     * @param $status
     *
     * @return string
     */
    public function getCommentStatus($status)
    {
        $availableOptions = $this->commentModel->getAnswerStatuses();

        return $availableOptions[$status];
    }
}
