<?php
/**
 * Blog comment block
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Dehtiarov Victor <videh@smile.fr>
 * @copyright 2019 Smile
 */
namespace Dehtiarov\BlogVideh\Block\Comment;


use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Dehtiarov\BlogVideh\Api\Data\CommentInterface;
use Dehtiarov\BlogVideh\Model\ResourceModel\Comment\Collection as CommentCollection;
use Dehtiarov\BlogVideh\Model\ResourceModel\Comment\CollectionFactory;
use Dehtiarov\BlogVideh\Model\Comment;
use Magento\Customer\Model\Session;

/**
 * Class Comment
 *
 * @package Dehtiarov\BlogVideh\Block\Comment
 */
class Comments extends Template
{
    /**
     * Comment collection factory
     *
     * @var CollectionFactory
     */
    protected $commentCollectionFactory;

    /**
     * Session
     *
     * @var Session
     */

    protected $session;

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
     * @param array                $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $commentCollectionFactory,
        Session $session,
        array $data = []
    ) {
        $this->commentCollectionFactory = $commentCollectionFactory;
        $this->session = $session;
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
        return $this->getChildHtml('pager');
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
                    CommentInterface::CREATED_AT,
                    CommentCollection::SORT_ORDER_ASC
                );
        }

        return $this->comments;
    }

    /**
     * Get action url for form
     *
     * @return string
     */
    public function getCommentActionUrl()
    {
        return $this->getUrl(
            'dehtiarov_blogvideh/blog_post/addcomment',
            ['_secure' => true]
        );
    }

    /**
     * Get postId
     *
     * @return int
     */
    public function getPostId()
    {
        return $this->getRequest()->getParam('id');
    }

    /**
     * Get customer info
     *
     * @return array
     */
    public function getCustomerInfo()
    {
        $response = NULL;

        if ($this->session->isLoggedIn()){
            $response['first_name'] = $this->session->getCustomer()->getData('firstname');
            $response['last_name'] = $this->session->getCustomer()->getData('lastname');
            $response['email'] = $this->session->getCustomer()->getData('email');
        }

        return $response;
    }
}
