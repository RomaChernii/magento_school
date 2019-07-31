<?php
/**
 * Blog add comment block
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Controller\Blog\Post;

use Koshyk\Blog\Api\CommentRepositoryInterface;
use Koshyk\Blog\Model\CommentFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class Index
 *
 * @package Koshyk\Blog\Controller\Post
 */
class AddComment extends Action
{
    /**
     * Comment repository interface
     *
     * @var CommentRepositoryInterface
     */
    private $commentRepository;
    /**
     * Comment factory
     *
     * @var CommentFactory
     */
    private $commentFactory;
    /**
     * AddComment constructor
     *
     * @param Context                    $context
     * @param CommentRepositoryInterface $commentRepository
     * @param CommentFactory             $commentFactory
     */
    public function __construct(
        Context $context,
        CommentFactory $commentFactory,
        CommentRepositoryInterface $commentRepository
    ) {
        $this->commentFactory = $commentFactory;
        $this->commentRepository = $commentRepository;
        return parent::__construct($context);
    }
    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $model = $this->commentFactory->create();
            $model->setData($data);
            try {
                $this->commentRepository->save($model);
                $this->messageManager->addSuccessMessage(__('Your comment is saved.'));
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while save the comment.'));
            }
        }
        return $resultRedirect->setPath($this->_redirect->getRefererUrl());
    }
}
