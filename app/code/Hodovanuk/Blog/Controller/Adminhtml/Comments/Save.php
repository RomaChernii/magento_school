<?php
namespace Hodovanuk\Blog\Controller\Adminhtml\Comments;

use Magento\Backend\App\Action;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\MediaStorage\Model\File\Uploader;
use Hodovanuk\Blog\Api\CommentRepositoryInterface;
use Hodovanuk\Blog\Model\CommentFactory;

/**
 * Class Save
 * @package Hodovanuk\Blog\Controller\Adminhtml\Comments
 */
class Save extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Hodovanuk_Blog::comments_save';

    const ADMIN_ANSWER_STATUS = '3';

    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * @var CommentFactory
     */
    private $commentFactory;

    /**
     * Save constructor.
     * @param Action\Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param CommentRepositoryInterface $comRepository
     * @param CommentFactory $comFactory
     */
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        CommentRepositoryInterface $comRepository,
        CommentFactory $comFactory
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->commentRepository = $comRepository;
        $this->commentFactory = $comFactory;
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
            $postObject = new DataObject();
            $postObject->setData($data);

            $id = $this->getRequest()->getParam('id');

            try {
                if (!$id) {
                    $data['id']= null;
                    $model = $this->commentFactory->create();
                } else {
                    $model = $this->commentRepository->getById($id);
                }

                if (!empty($data['answer_data'])) {
                    $data['answer'] = self::ADMIN_ANSWER_STATUS;
                }
                $model->setData($data);
                $this->commentRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You comment  save.'));
                $this->dataPersistor->clear('hodovanuk_blog_comment');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }

                return $resultRedirect->setPath('*/*/');
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while save the comment.'));
            }

            $this->dataPersistor->set('hodovanuk_blog_comment', $data);

            return $resultRedirect->setPath(
                '*/*/edit',
                ['id' => $this->getRequest()->getParam('id')]
            );
        }

        return $resultRedirect->setPath('*/*/');
    }
}
