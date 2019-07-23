<?php

namespace Semysiuk\BlogModule\Block\Comment;

use Magento\Framework\View\Element\Template;
use Semysiuk\BlogModule\Api\CommentRepositoryInterface;

class Listing extends Template
{
    protected $comments;
    protected $postId;
    protected $commentRepository;

    public function __construct(
        Template\Context $context,
        CommentRepositoryInterface $commentRepository,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->commentRepository = $commentRepository;
        $this->postId = $this->getRequest()->getParam(("id"));
    }

    public function getCommentsByPost()
    {
        return $this->comments === null ?
            $this->commentRepository->getCommentsByPostId($this->postId) :
            $this->comments;
    }
}
