<?php
/**
 * Blog comment save
 *
 */
namespace Skavronskiy\Blog\Controller\Adminhtml\Comment;

use Magento\Backend\App\Action;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\NoSuchEntityException;
use Skavronskiy\Blog\Api\CommentRepositoryInterface;
use Skavronskiy\Blog\Model\CommentFactory;
use Skavronskiy\Blog\Model\Comment;

/**
 * Class Index
 *
 * @package Skavronskiy\Blog\Controller\Adminhtml\Comment
 */
class Save extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Skavronskiy_Blog::comment_save';

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
     * @param Action\Context          $context
     * @param DataPersistorInterface  $dataPersistor
     * @param CommentRepositoryInterface $commentRepository
     * @param CommentFactory             $commentFactory
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
            $commentObject = new DataObject();
            $commentObject->setData($data);

            $id = $this->getRequest()->getParam('id');

            try {
                if (!$id) {
                    $data['id']= null;
                    $model = $this->commentFactory->create();
                } else {
                    $model = $this->commentRepository->getById($id);
                }

                $model->setData($data);
                if($data['answer'])
                    $model->setStatus(Comment::STATUS_CLOSED);
                $this->commentRepository->save($model);
                $this->messageManager->addSuccessMessage(__('Comment is saved.'));
                $this->dataPersistor->clear('skavronskiy_blog_comment');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }

                return $resultRedirect->setPath('*/*/');
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while save the comment.'));
            }

            $this->dataPersistor->set('skavronskiy_blog_comment', $data);

            return $resultRedirect->setPath(
                '*/*/edit',
                ['id' => $this->getRequest()->getParam('id')]
            );
        }

        return $resultRedirect->setPath('*/*/');
    }
}
