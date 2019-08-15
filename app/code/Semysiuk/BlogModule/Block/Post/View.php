<?php

namespace Semysiuk\BlogModule\Block\Post;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Semysiuk\BlogModule\Api\CommentRepositoryInterface;
use Semysiuk\BlogModule\Api\PostRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Message\ManagerInterface;
use Semysiuk\BlogModule\Model\ResourceModel\Comment\Collection as CommentCollection;
use Semysiuk\BlogModule\Model\ResourceModel\Comment\CollectionFactory;
use Semysiuk\BlogModule\Api\Data\CommentInterface;

/**
 * Class View
 *
 * @package Semysiuk\BlogModule\Block\Post
 */
class View extends AbstractPost
{
    /**
     * #@+
     * Config path const
     */
    const POST_IMAGE_HEIGHT = 'semysiuk_blogmodule/post_view/image/height';
    const POST_IMAGE_WIDTH = 'semysiuk_blogmodule/post_view/image/width';
    /**#@-*/

    /**
     * Post repository
     *
     * @var PostRepositoryInterface
     */
    protected $postRepository;

    /**
     * Post
     *
     * @var \Semysiuk\BlogModule\Api\Data\PostInterface
     */
    protected $post;

    /**
     * Message manager
     *
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * Comment repository
     *
     * @var CommentRepositoryInterface
     */
    protected $commentRepository;

    /**
     * Comment collection factory
     *
     * @var CollectionFactory
     */
    protected $commentCollectionFactory;

    /**
     * Comments
     *
     * @var \Semysiuk\BlogModule\Api\Data\CommentInterface
     */
    protected $comments;

    /**
     * View constructor
     *
     * @param Context                 $context
     * @param PostRepositoryInterface $postRepository
     * @param CommentRepositoryInterface $commentRepository
     * @param CollectionFactory       $commentCollectionFactory
     * @param ScopeConfigInterface    $scopeConfig
     * @param ManagerInterface        $messageManager
     * @param array                   $data
     */
    public function __construct(
        Context $context,
        PostRepositoryInterface $postRepository,
        CommentRepositoryInterface $commentRepository,
        CollectionFactory $commentCollectionFactory,
        ScopeConfigInterface $scopeConfig,
        ManagerInterface $messageManager,
        array $data = []
    ) {
        $this->postRepository = $postRepository;
        $this->commentRepository = $commentRepository;
        $this->commentCollectionFactory = $commentCollectionFactory;
        $this->messageManager = $messageManager;
        parent::__construct(
            $context,
            $scopeConfig,
            $data
        );
    }

    /**
     * Prepare layout
     * Add pager to page and set title
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('Commetns:'));

        if ($this->getComments()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'blog.post.listing.pager'
            )->setCollection(
                $this->getComments()
            );
            $this->setChild('pager', $pager);
            $this->getComments()->load();
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    /**
     * Get post
     *
     * @return \Semysiuk\BlogModule\Api\Data\PostInterface
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
     * Get comments
     *
     * @return CommentCollection
     */
    public function getComments()
    {
        if ($this->comments === null) {
            $postId = $this->getRequest()->getParam("id");
            $this->comments = $this->commentRepository->getCommentsByPostId($postId);
            $this->comments->addOrder(
                CommentInterface::STATUS,
                CommentCollection::SORT_ORDER
            );
        }

        return $this->comments;
    }
}

