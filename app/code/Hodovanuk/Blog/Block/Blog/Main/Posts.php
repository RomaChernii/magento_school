<?php
namespace Hodovanuk\Blog\Block\Blog\Main;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Hodovanuk\Blog\Api\Data\PostInterface;
use Hodovanuk\Blog\Model\ResourceModel\Post\Collection as PostCollection;
use Hodovanuk\Blog\Model\ResourceModel\Post\CollectionFactory;
use Hodovanuk\Blog\Api\CommentRepositoryInterface;

/**
 * Class Posts
 * @package Hodovanuk\Blog\Block\Blog\Main
 */
class Posts extends AbstractPost
{
    /**
     * @var CollectionFactory
     */
    protected $postCollectionFactory;

    /**
     * @var
     */
    protected $posts;

    /**
     * @var CommentRepositoryInterface
     */
    protected $commentsCount;
    /**
     * Posts constructor.
     * @param Context $context
     * @param CollectionFactory $postCollectionFactory
     * @param ScopeConfigInterface $scopeConfig
     * @param array $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $postCollectionFactory,
        ScopeConfigInterface $scopeConfig,
        CommentRepositoryInterface $commentRepository,
        array $data = []
    ) {
        $this->postCollectionFactory = $postCollectionFactory;
        $this->commentsCount = $commentRepository;
        parent::__construct(
            $context,
            $scopeConfig,
            $data
        );
    }

    /**
     * Set title
     *
     * Create child template pager
     *
     * @return $this|AbstractPost
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('Posts Listing'));
        if ($this->getPosts()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'blog.post.listing.pager'
            )->setCollection(
                $this->getPosts()
            );
            $this->setChild('pager', $pager);
            $this->getPosts()->load();
        }
        return $this;
    }

    /**
     * Get child template pager
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    /**
     * Get active Posts
     * @return PostCollection
     */
    public function getPosts()
    {
        if ($this->posts === null) {
            $this->posts = $this->postCollectionFactory->create()
                ->addFilter('is_active', 1)
                ->addOrder(
                    PostInterface::UPDATE_AT,
                    PostCollection::SORT_ORDER_DESC
                );
        }
        return $this->posts;
    }

    /**
     * Get for each post url
     * @param $post
     * @return string
     */
    public function getPostUrl($post)
    {
        return $this->getUrl(
            'myblog/blog/view',
            ['id' => $post->getId()]
        );
    }

    /**
     * Get comments number
     * @param $id
     * @return int|void
     */
    public function getCommentsNumber($id)
    {
        $returnComments = $this->commentsCount->getByPostId($id);
        $returnComments = count($returnComments);

        return $returnComments;
    }
}
