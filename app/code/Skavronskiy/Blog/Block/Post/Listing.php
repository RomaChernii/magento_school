<?php
/**
 * Blog posts listing block
 *
 */
namespace Skavronskiy\Blog\Block\Post;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Skavronskiy\Blog\Api\Data\PostInterface;
use Skavronskiy\Blog\Model\ResourceModel\Post\Collection as PostCollection;
use Skavronskiy\Blog\Model\ResourceModel\Post\CollectionFactory;

/**
 * Class Listing
 *
 * @package Skavronskiy\Blog\Block\Post
 */
class Listing extends AbstractPost
{
    /**
     * Post collection factory
     *
     * @var CollectionFactory
     */
    protected $postCollectionFactory;

    /**
     * Post collection
     *
     * @var PostCollection
     */
    protected $posts;

    /**
     * Listing constructor
     *
     * @param Context              $context
     * @param CollectionFactory    $postCollectionFactory
     * @param ScopeConfigInterface $scopeConfig
     * @param array                $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $postCollectionFactory,
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->postCollectionFactory = $postCollectionFactory;
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
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    /**
     * Get posts
     *
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
     * Get post url
     *
     * @param \Skavronskiy\Blog\Model\Post $post
     *
     * @return string
     */
    public function getPostUrl($post)
    {
        return $this->getUrl(
            'skavronskiy_blog/blog_post/view',
            ['id' => $post->getId()]
        );
    }
}
