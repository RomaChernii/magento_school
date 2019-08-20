<?php
/**
 * Lebed Blog Post DataProvider
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Model\Post;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Backend\Model\UrlInterface;
use Lebed\Blog\Model\ResourceModel\Post\CollectionFactory;

/**
 * Class DataProvider
 *
 * @package Lebed\Blog\Model\Post
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * Post collection
     *
     * @var \Lebed\Blog\Model\ResourceModel\Post\Collection
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
     * @param CollectionFactory      $postCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param StoreManagerInterface  $storeManager
     * @param array                  $meta
     * @param array                  $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $postCollectionFactory,
        DataPersistorInterface $dataPersistor,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $postCollectionFactory->create();
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
        if ($this->loadedData === null) {
            $this->loadedData = [];
            $items = $this->collection->getItems();

            foreach ($items as $post) {
                $mediaUrl = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
                $url = $mediaUrl . $post->getImage();
                $image[] = [
                    'url'  => $url,
                    'file' => basename($post->getImage())
                ];
                $post->setImage($image);

                $this->loadedData[$post->getId()] = $post->getData();
            }

            $data = $this->dataPersistor->get('lebed_blog_post');
            if (!empty($data)) {
                $post = $this->collection->getNewEmptyItem();
                $post->setData($data);
                $this->loadedData[$post->getId()] = $post->getData();
                $this->dataPersistor->clear('lebed_blog_post');
            }
        }

        return $this->loadedData;
    }
}
