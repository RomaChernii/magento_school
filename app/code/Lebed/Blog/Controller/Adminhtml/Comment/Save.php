<?php
/**
 * Lebed Blog Comment Save
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Controller\Adminhtml\Comment;

use Lebed\Blog\Api\CommentRepositoryInterface;
use Lebed\Blog\Model\CommentFactory;
use Magento\Backend\App\Action;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\NoSuchEntityException;
use Lebed\Blog\Model\Comment as CommentModel;

/**
 * Class Save
 *
 * @package Lebed\Blog\Controller\Adminhtml\Comment
 */
class Save extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Lebed_Blog::comment_save';

    /**
     * Comment Factory
     *
     * @var CommentFactory
     */
    private $commentFactory;

    /**
     * Comment Repository
     *
     * @var CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * Data Persistor
     *
     * @var \Magento\Framework\App\Request\DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * Save constructor.
     *
     * @param \Magento\Backend\App\Action\Context                   $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     * @param \Lebed\Blog\Api\CommentRepositoryInterface            $commentRepository
     * @param \Lebed\Blog\Model\CommentFactory                      $commentFactory
     */
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        CommentRepositoryInterface $commentRepository,
        CommentFactory $commentFactory
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->commentRepository = $commentRepository;
        $this->commentFactory = $commentFactory;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $commentObject = new DataObject();
            $commentObject->setData($data);

            $id = $this->getRequest()->getParam('id');

            try {
                /** @var \Lebed\Blog\Model\Comment $model */
                $model = $this->commentRepository->getById($id);
                $model->setData($data);
                $this->commentRepository->save($model);

                $status = $model->getStatus();
                $answer = $model->getAnswer();
                if ($status == CommentModel::STATUS_NEW && !$answer) {
                    $model->setStatus(CommentModel::STATUS_IN_PROGRESS);
                }
                if ($answer) {
                    $model->setStatus(CommentModel::STATUS_CLOSED);
                }
                $this->commentRepository->save($model);

                $this->messageManager->addSuccessMessage(__('Your comment updated'));
                $this->dataPersistor->clear('lebed_blog_comment');

                if($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit'. ['id' => $model->getId()]);
                }

                return $resultRedirect->setPath('*/*/*');
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while save the comment.'));
            }

            $this->dataPersistor->set('lebed_blog_comment', $data);

            return $resultRedirect->setPath(
                '*/*/edit',
                ['id' => $this->getRequest()->getParam('id')]
            );
        }

        return $resultRedirect->setPath('*/*/');
    }
}
