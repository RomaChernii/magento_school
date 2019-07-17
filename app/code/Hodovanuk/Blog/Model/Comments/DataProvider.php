<?php
namespace Hodovanuk\Blog\Model\Comments;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Backend\Model\UrlInterface;
use Hodovanuk\Blog\Model\ResourceModel\Comment\CollectionFactory;

/**
 * Class DataProvider
 * @package Hodovanuk\Blog\Model\Post
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * @var
     */
    protected $collection;

    /**
     * Data persistor interface
     *
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * Loaded data
     *
     * @var array
     */
    private $loadedData;

    /**
     * Store manager
     *
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * DataProvider constructor
     *
     * @param string                 $name
     * @param string                 $primaryFieldName
     * @param string                 $requestFieldName
     * @param CollectionFactory      $PostCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param StoreManagerInterface    $storeManager
     * @param array                  $meta
     * @param array                  $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $CommentCollectionFactory,
        DataPersistorInterface $dataPersistor,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $CommentCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->storeManager = $storeManager;
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $meta,
            $data
        );
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $data = $this->dataPersistor->get('hodovanuk_blog_comment');
        if (!empty($data)) {
            $post = $this->collection->getNewEmptyItem();
            $post->setData($data);
            $this->loadedData[$post->getId()] = $post->getData();
            $this->dataPersistor->clear('hodovanuk_blog_comment');
        }

        return $this->loadedData;
    }
}
