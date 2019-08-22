<?php
/**
 * Lebed Blog Post Save
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\NoSuchEntityException;
use Lebed\Blog\Model\Post\Image\Uploader;
use Lebed\Blog\Api\PostRepositoryInterface;
use Lebed\Blog\Model\PostFactory;

/**
 * Class Save
 *
 * @package Lebed\Blog\Controller\Adminhtml\Post
 */
class Save extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Lebed_Blog::post_save';

    /**
     * Data persistor interface
     *
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * Post repository interface
     *
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * Post factory
     *
     * @var PostFactory
     */
    private $postFactory;

    /**
     * Save constructor
     *
     * @param Action\Context          $context
     * @param DataPersistorInterface  $dataPersistor
     * @param PostRepositoryInterface $postRepository
     * @param PostFactory             $postFactory
     */
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        PostRepositoryInterface $postRepository,
        PostFactory $postFactory
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->postRepository = $postRepository;
        $this->postFactory = $postFactory;
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
        if ($data['image']) {
            $image = reset($data['image']);
            $url = Uploader::FILE_PATH . '/' . $image['file'];
            $data['image'] = $url;
        }

        if ($data) {
            $postObject = new DataObject();
            $postObject->setData($data);

            $id = $this->getRequest()->getParam('id');

            try {
                if (!$id) {
                    $data['id']= null;
                    $model = $this->postFactory->create();
                } else {
                    $model = $this->postRepository->getById($id);
                }

                $model->setData($data);

                $this->_eventManager->dispatch(
                    'lebed_blog_post_save_before',
                    ['post' => $model]
                );

                $this->postRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You the post save.'));

                $this->_eventManager->dispatch(
                    'lebed_blog_post_success_save',
                    ['post' => $model]
                );

                $this->dataPersistor->clear('lebed_blog_post');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }

                return $resultRedirect->setPath('*/*/');
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while save the post.'));
            }

            $this->dataPersistor->set('lebed_blog_post', $data);

            return $resultRedirect->setPath(
                '*/*/edit',
                ['id' => $this->getRequest()->getParam('id')]
            );
        }

        return $resultRedirect->setPath('*/*/');
    }
}
