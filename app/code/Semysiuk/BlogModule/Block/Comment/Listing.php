<?php

namespace Semysiuk\BlogModule\Block\Comment;

use Magento\Framework\View\Element\Template;
use Semysiuk\BlogModule\Api\CommentRepositoryInterface;

/**
 * Class Listing
 *
 * @package Semysiuk\BlogModule\Block\Comment
 */
class Listing extends Template
{
    /**
     *Comment Repository
     *
     * @var CommentRepositoryInterface
     */
    protected $commentRepository;

    /**
     * Listing constructor.
     * @param Template\Context $context
     * @param CommentRepositoryInterface $commentRepository
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        CommentRepositoryInterface $commentRepository,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->commentRepository = $commentRepository;
    }

    public function getCommentsByPost()
    {
        return $this->commentRepository->getCommentsByPostId($this->getRequest()->getParam("id"));
    }
}
