<?php

namespace Semysiuk\BlogModule\Controller\Adminhtml\Comment;

use Magento\Backend\App\Action;
use Semysiuk\BlogModule\Api\CommentRepositoryInterface;
use Semysiuk\BlogModule\Model\CommentFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Semysiuk\BlogModule\Model\Comment;

/**
 * Class Index
 *
 * @package Semysiuk\BlogModule\Controller\Adminhtml\Comment
 */
class Save extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Semysiuk_BlogModule::comment_save';

    /**
     * Data persistor interface
     *
     * @var DataPersistorInterface
     */
    private $dataPersistor;

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
     * Save constructor
     *
     * @param Action\Context $context
     * @param CommentRepositoryInterface $commentRepository
     * @param CommentFactory $commentFactory
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Action\Context $context,
        CommentRepositoryInterface $commentRepository,
        CommentFactory $commentFactory,
        DataPersistorInterface $dataPersistor
    ) {
        $this->commentRepository = $commentRepository;
        $this->commentFactory = $commentFactory;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
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

        $id = $this->getRequest()->getParam('id');

        if ($data['answer']) {
            $model = $this->commentRepository->getById($id);
            $model->setData($data);
            
            try {
                $this->commentRepository->save($model);
                $model->setStatus(Comment::STATUS_CLOSED);
                $this->messageManager->addSuccessMessage(__('The reply to the comment is written.'));
                
                return $resultRedirect->setPath('*/*/');
            }
            catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while save the comment.'));
            }
        }

        return $resultRedirect->setPath(
            '*/*/edit',
            [
                'id' => $this->getRequest()->getParam('id')
            ]);
    }
}
