<?php
/**
 * Commented action
 *
 * @category Hodovanuk
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
 */

namespace Hodovanuk\Blog\Controller\Blog;

use Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;
use Magento\Framework\DataObject;
use Hodovanuk\Blog\Model\CommentFactory;
use Hodovanuk\Blog\Api\CommentRepositoryInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class Commented
 *
 *
 * @package Hodovanuk\Blog\Controller\Blog
 */
class Commented extends Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * @var CommentFactory
     */
    protected $commentFactory;

    /**
     * @var CommentRepositoryInterface
     */
    protected $commentRepository;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * Commented constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param CommentFactory $cmFactory
     * @param CommentRepositoryInterface $cmRepository
     * @param DataPersistorInterface $dPresistor
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
     * Get form data and writes it into database
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect ->setPath('*/*/');

        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $commentObject = new DataObject();
            $commentObject->setData($data);

            try {
                $model = $this->commentFactory->create();
                $model->setData($data);

                if ($this->commentRepository->save($model)) {
                    $this->messageManager->addSuccessMessage(__('Your comment save.'));
                    $this->dataPersistor->clear('hodovanuk_blog_comment');

                    return $resultRedirect->setPath('*/*/view', ['id' => $model->getPostId()]);

                } else
                    $resultRedirect->setPath($this->_redirect->getRefererUrl());
            }
            catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while save the comment.'));
            }
        }

        return $resultRedirect;
    }
}
