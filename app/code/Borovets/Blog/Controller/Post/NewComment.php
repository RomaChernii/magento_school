<?php
/**
 * Blog comment save
 */
namespace Borovets\Blog\Controller\Post;

use Borovets\Blog\Api\CommentRepositoryInterface;
use Borovets\Blog\Model\CommentFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class Index
 *
 * @package Borovets\Blog\Controller\Post
 */
class NewComment extends Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;
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
        Context $context,
        PageFactory $pageFactory,
        CommentFactory $cmFactory,
        CommentRepositoryInterface $cmRepository,
        DataPersistorInterface $dPresistor
    ) {
        $this->_pageFactory = $pageFactory;
        $this->commentFactory = $cmFactory;
        $this->commentRepository = $cmRepository;
        $this->dataPersistor = $dPresistor;
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

                return $resultRedirect->setPath($this->_redirect->getRefererUrl());
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while save the comment.'));
            }
        }

        return $resultRedirect->setPath($this->_redirect->getRefererUrl());
    }
}
