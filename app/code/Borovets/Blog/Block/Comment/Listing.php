<?php
/**
 * Blog comments listing block
 */
namespace Borovets\Blog\Block\Comment;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Borovets\Blog\Api\Data\CommentInterface;
use Borovets\Blog\Model\ResourceModel\Comment\Collection as CommentCollection;
use Borovets\Blog\Model\ResourceModel\Comment\CollectionFactory;

/**
 * Class Listing
 *
 * @package Borovets\Blog\Block\Comment
 */
class Listing extends AbstractComment
{
    /**
     * Comment collection factory
     *
     * @var CollectionFactory
     */
    protected $commentCollectionFactory;

    /**
     * Comment collection
     *
     * @var CommentCollection
     */
    protected $comments;

    /**
     * Listing constructor
     *
     * @param Context              $context
     * @param CollectionFactory    $commentCollectionFactory
     * @param ScopeConfigInterface $scopeConfig
     * @param array                $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $commentCollectionFactory,
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->commentCollectionFactory = $commentCollectionFactory;
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

        if ($this->getComments()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'blog.comment.listing.pager'
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
     * Get comments
     *
     * @return CommentCollection
     */
    public function getComments()
    {
        $id = $this->getRequest()->getParam('id');
        if ($this->comments === null) {
            $this->comments = $this->commentCollectionFactory->create()
                ->addFilter(CommentInterface::POST_ID, $id)
                ->addOrder(
                    CommentInterface::WRITED_AT,
                    CommentCollection::SORT_ORDER_ASC
                );
        }

        return $this->comments;
    }
}
