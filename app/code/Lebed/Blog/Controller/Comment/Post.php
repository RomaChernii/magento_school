<?php
/**
 * Lebed Blog Post
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Controller\Comment;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Lebed\Blog\Model\PostRepository;
use Lebed\Blog\Model\Post as PostModel;
use Lebed\Blog\Model\CommentRepository;
use Lebed\Blog\Model\CommentFactory;

/**
 * Class Post
 *
 * @package Lebed\Blog\Controller\Comment
 */
class Post extends Action
{
    /**
     * Form key Validator
     *
     * @var Validator
     */
    protected $formKeyValidator;

    /**
     * Post Model
     *
     * @var PostModel
     */
    protected $post;

    /**
     * Post Repository
     *
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * Comment Factory
     *
     * @var CommentFactory
     */
    private $commentFactory;

    /**
     * Comment Repository
     *
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * Post constructor.
     *
     * @param Context           $context
     * @param Validator         $formKeyValidator
     * @param PostRepository    $postRepository
     * @param CommentFactory    $commentFactory
     * @param CommentRepository $commentRepository
     */
    public function __construct(
        Context           $context,
        Validator         $formKeyValidator,
        PostRepository    $postRepository,
        CommentFactory    $commentFactory,
        CommentRepository $commentRepository
    ) {
        $this->formKeyValidator = $formKeyValidator;
        $this->postRepository = $postRepository;
        $this->commentFactory = $commentFactory;
        $this->commentRepository = $commentRepository;
        parent::__construct($context);
    }

    /**
     * Submit new blog post comment action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        if (!$this->formKeyValidator->validate($this->getRequest())) {
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());

            return $resultRedirect;
        }

        $postId = $this->getRequest()->getParam('post_id');
        $data = $this->getRequest()->getPostValue();

        if ($this->getPostById($postId) && !empty($data)) {
            /** @var \Lebed\Blog\Model\Comment $comment */
            $comment = $this->commentFactory->create();
            $comment->setData($data);
            $comment->setPostId($postId);
            $validate = $comment->validate();
            if ($validate === true) {
                try {
                    $this->commentRepository->save($comment);
                    $this->messageManager->addSuccessMessage(__('Your comment has been saved'));
                } catch (CouldNotSaveException $exception) {
                    $this->messageManager->addErrorMessage(__('We can\'t save your comment right now.'));
                }
            }
            if (is_array($validate)) {
                foreach ($validate as $errorMessage) {
                    $this->messageManager->addErrorMessage($errorMessage);
                }
            }
        }
        $resultRedirect->setUrl($this->_redirect->getRedirectUrl());

        return $resultRedirect;
    }

    /**
     * Get Post
     *
     * @param string $postId
     *
     * @return bool|\Lebed\Blog\Model\Post
     */
    public function getPostById($postId) {
        if ($this->post === null && $postId) {
            try {
                $this->post = $this->postRepository->getById($postId);
            } catch (NoSuchEntityException $e) {
                return false;
            }
        }

        return $this->post;
    }
}
