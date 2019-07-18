<?php
/**
 * Lebed Blog posts listing block
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Block\Post;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Lebed\Blog\Api\Data\PostInterface;
use Lebed\Blog\Model\ResourceModel\Post\Collection as PostCollection;
use Lebed\Blog\Model\ResourceModel\Post\CollectionFactory;

/**
 * Class Listing
 *
 * @package Lebed\Blog\Block\Post
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
            /** @var \Magento\Theme\Block\Html\Pager $pager **/
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'blog.post.listing.pager'
            );
            $pager->setLimit(3)
                  ->setCollection($this->getPosts());

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
     * @param \Lebed\Blog\Model\Post $post
     *
     * @return string
     */
    public function getPostUrl($post)
    {
        return $this->getUrl(
            'lebed_blog/blog_post/view',
            ['id' => $post->getId()]
        );
    }
}
