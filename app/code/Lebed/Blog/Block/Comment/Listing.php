<?php
/**
 * Lebed Blog Listing Block
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Block\Comment;

use Lebed\Blog\Api\Data\CommentInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Lebed\Blog\Model\ResourceModel\Comment\CollectionFactory as CommentCollectionFactory;
use Lebed\Blog\Model\ResourceModel\Comment\Collection as CommentCollection;

/**
 * Class Listing
 *
 * @package Lebed\Blog\Block\Comment
 */
class Listing extends Template
{
    /**
     * Comment Collection
     *
     * @var CommentCollection
     */
    protected $comments;

    /**
     * Comment Collection Factory
     *
     * @var CommentCollectionFactory
     */
    protected $commentCollectionFactory;

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if ($this->getComments()) {
            /** @var \Magento\Theme\Block\Html\Pager $pager * */
            $pager = $this->getLayout()->createBlock(
                '\Magento\Theme\Block\Html\Pager',
                'blog.post.comment.pager'
            );
            $pager->setLimit(5)
                  ->setCollection($this->getComments());

            $this->setChild('pager', $pager);
            $this->getComments()->load();
        }

        return $this;
    }

    /**
     * Listing constructor.
     *
     * @param Context                  $context
     * @param CommentCollectionFactory $commentCollectionFactory
     * @param array                    $data
     */
    public function __construct(
        Context $context,
        CommentCollectionFactory $commentCollectionFactory,
        array $data = []
    ) {
        $this->commentCollectionFactory = $commentCollectionFactory;
        parent::__construct(
            $context,
            $data
        );
    }

    /**
     * Get comments
     *
     * @return CommentCollection
     */
    public function getComments()
    {
        if ($this->comments === null) {
            $this->comments = $this->commentCollectionFactory->create()
                ->addFilter('post_id', $this->getRequest()->getParam('id'))
                ->addOrder(
                    CommentInterface::CREATED_AT,
                    CommentCollection::SORT_ORDER_DESC
                );
        }

        return $this->comments;
    }

    /**
     * Get pager html
     *
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
