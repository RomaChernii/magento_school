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
use Dehtiarov\BlogVideh\Api\PostRepositoryInterface;
use Dehtiarov\BlogVideh\Api\CommentRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Message\ManagerInterface;

/**
 * Class Comment
 *
 * @package Dehtiarov\BlogVideh\Block\Comment
 */
class View extends Template
{
    /**
     * Post repository
     *
     * @var PostRepositoryInterface
     */
    protected $postRepository;

    /**
     * Post
     *
     * @var \Dehtiarov\BlogVideh\Api\Data\PostInterface
     */
    protected $post;

    /**
     * Comment repository
     *
     * @var CommentRepositoryInterface
     */
    protected $commentRepository;

    /**
     * Comment
     *
     * @var \Dehtiarov\BlogVideh\Api\Data\CommentInterface
     */
    protected $comment;

    /**
     * Message manager
     *
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * View constructor
     *
     * @param Context                 $context
     * @param PostRepositoryInterface $postRepository
     * @param CommentRepositoryInterface $commentRepository
     * @param ManagerInterface        $messageManager
     * @param array                   $data
     */
    public function __construct(
        Context $context,
        PostRepositoryInterface $postRepository,
        CommentRepositoryInterface $commentRepository,
        ManagerInterface $messageManager,
        array $data = []
    ) {
        $this->postRepository = $postRepository;
        $this->commentRepository = $commentRepository;
        $this->messageManager = $messageManager;
        parent::__construct(
            $context,
            $data
        );
    }

    /**
     * Get postId
     *
     * @return \Dehtiarov\BlogVideh\Api\Data\PostInterface
     */
    public function getPostId()
    {
        if ($this->post == null) {
            $postId = $this->getRequest()->getParam('id');
        }

        return $postId;
    }
}
