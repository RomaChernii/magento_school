<?php
/**
 * Blog Post data provider
 *
 * @category  Roche
 * @package   Myskovets\BlogModule
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Myskovets\BlogModule\Model\Post;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Backend\Model\UrlInterface;
use Myskovets\BlogModule\Model\ResourceModel\Post\CollectionFactory;

/**
 * Class DataProvider
 *
 * @package Myskovets\BlogModule\Model\Post\DataProvider
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * Post collection
     *
     * @var \Myskovets\BlogModule`\Model\ResourceModel\Post\Collection
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

            $data = $this->dataPersistor->get('roche_blog_post');
            if (!empty($data)) {
                $post = $this->collection->getNewEmptyItem();
                $post->setData($data);
                $this->loadedData[$post->getId()] = $post->getData();
                $this->dataPersistor->clear('roche_blog_post');
            }
        }

        return $this->loadedData;
    }
}
