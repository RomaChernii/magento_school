<?php
/**
 * Blog comment block
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Block\Comment;

use Magento\Framework\View\Element\Template\Context;
use Koshyk\Blog\Api\Data\CommentInterface;
use Koshyk\Blog\Model\ResourceModel\Comment\Collection as CommentCollection;
use Koshyk\Blog\Model\ResourceModel\Comment\CollectionFactory;

/**
 * Class Listing
 *
 * @package Koshyk\Blog\Block\Comment
 */
class View extends AbstractComment
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
     * @param Context $context
     * @param CollectionFactory $commentCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $commentCollectionFactory,
          array $data = []
    )
    {
        $this->commentCollectionFactory = $commentCollectionFactory;
        parent::__construct(
            $context,
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
        if ($this->comments === null) {
            $postId = $this->getRequest()->getParam('id');
            $this->comments = $this->commentCollectionFactory->create()
                ->addFilter('post_id', $postId)
                ->addOrder(
                    CommentInterface::CREATE_DATE,
                    CommentCollection::SORT_ORDER_DESC
                );
        }

        return $this->comments;
    }
}
