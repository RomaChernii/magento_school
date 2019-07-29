<?php
/**
 * Lebed Blog comment generic button
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Block\Adminhtml\Comment\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Lebed\Blog\Api\CommentRepositoryInterface;

/**
 * Class GenericButton
 *
 * @package Lebed\Blog\Block\Adminhtml\Comment\Edit
 */
class GenericButton
{
    /**
     * Context
     *
     * @var Context
     */
    private $context;

    /**
     * Comment repository interface
     *
     * @var CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * GenericButton constructor
     *
     * @param Context                 $context
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct(
        Context $context,
        CommentRepositoryInterface $commentRepository
    ) {
        $this->context = $context;
        $this->commentRepository = $commentRepository;
    }

    /**
     * Get Comment ID
     *
     * @return int|null
     */
    public function getCommentId()
    {
        /** @var \Lebed\Blog\Model\Comment $comment */
        $comment = $this->getComment();
        $id = null;
        if ($comment) {
            $id = $comment->getId();
        }

        return $id;
    }

    /**
     * Get comment
     *
     * @return \Lebed\Blog\Api\CommentRepositoryInterface|null
     */
    public function getComment()
    {
        try {
            $modelId = $this->context->getRequest()->getParam('id');

            return $this->commentRepository->getById($modelId);
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }

    /**
     * Get Commented Post ID
     *
     * @return int|null
     */
    public function getPostId()
    {
        /** @var \Lebed\Blog\Model\Comment $comment */
        $comment = $this->getComment();
        $postId = null;
        if ($comment) {
            $postId = $comment->getPostId();
        }

        return $postId;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array  $params
     *
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
