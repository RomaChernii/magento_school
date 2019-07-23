<?php

namespace Semysiuk\BlogModule\Model\Comment;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Backend\Model\UrlInterface;
use Semysiuk\BlogModule\Model\ResourceModel\Comment\CollectionFactory;

/**
 * Class DataProvider
 *
 * @package Semysiuk\BlogModule\Model\Comment\DataProvider
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * Comment collection
     *
     * @var \Semysiuk\BlogModule\Model\ResourceModel\Comment\Collection
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
     * @param CollectionFactory      $CommentCollectionFactory
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

        $data = $this->dataPersistor->get('semysiuk_blogmodule_comment');
        if (!empty($data)) {
            $post = $this->collection->getNewEmptyItem();
            $post->setData($data);
            $this->loadedData[$post->getId()] = $post->getData();
            $this->dataPersistor->clear('semysiuk_blogmodule_comment');
        }

        return $this->loadedData;
    }
}

