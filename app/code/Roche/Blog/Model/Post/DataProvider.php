<?php
/**
 * Blog Post data provider
 *
 * @category  Roche
 * @package   Roche\Blog
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2018 Smile
 */
namespace Roche\Blog\Model\Post;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Roche\Blog\Model\ResourceModel\Post\CollectionFactory;

/**
 * Class DataProvider
 *
 * @package Roche\Blog\Model\Post\DataProvider
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * Post collection
     *
     * @var \Roche\Blog\Model\ResourceModel\Post\Collection
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
     * DataProvider constructor
     *
     * @param string                 $name
     * @param string                 $primaryFieldName
     * @param string                 $requestFieldName
     * @param CollectionFactory      $PostCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array                  $meta
     * @param array                  $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $PostCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $PostCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
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
        foreach ($items as $Post) {
            $this->loadedData[$Post->getId()] = $Post->getData();
        }

        $data = $this->dataPersistor->get('roche_blog_post');
        if (!empty($data)) {
            $Post = $this->collection->getNewEmptyItem();
            $Post->setData($data);
            $this->loadedData[$Post->getId()] = $Post->getData();
            $this->dataPersistor->clear('roche_blog_post');
        }

        return $this->loadedData;
    }
}
