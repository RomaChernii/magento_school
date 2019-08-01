<?php

namespace Semysiuk\BlogModule\Controller\Blog\Comment;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Semysiuk\BlogModule\Model\CommentFactory;
use Semysiuk\BlogModule\Api\CommentRepositoryInterface;

/**
 * Class Index
 *
 * @package Semysiuk\BlogModule\Controller\Blog\Comment
 */
class Index extends Action
{
    const COMMENT_SUCCESS_URL = "semysiuk_blogmodule/blog_post/view";

    /**
     * Comment Factory
     *
     * @var CommentFactory
     */
    protected $commentFactory;

    /**
     * Comment repository interface
     *
     * @var CommentRepositoryInterface
     */
    protected $commentRepository;

    /**
     * Index constructor.
     * @param Context $context
     * @param CommentRepositoryInterface $commentRepository
     * @param CommentFactory $commentFactory
     */
    public function __construct(
        Context $context,
        CommentRepositoryInterface $commentRepository,
        CommentFactory $commentFactory
    )
    {
        parent::__construct($context);
        $this->commentRepository = $commentRepository;
        $this->commentFactory = $commentFactory;
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data =  $this->getRequest()->getPostValue();
        $resultRedirect->setPath(static::COMMENT_SUCCESS_URL, ['id' => $this->getRequest()->getParam('id')]);

        if ($data) {
            $model = $this->commentFactory->create();
            $model->setData($data);
            
            try {
                $this->commentRepository->save($model);
                $this->messageManager->addSuccessMessage(__('Comment successfully saved.'));
            }
            catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while save the comment.'));
            }
        }        

        return $resultRedirect;
    }
}
