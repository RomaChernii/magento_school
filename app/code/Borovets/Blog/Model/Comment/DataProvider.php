<?php
/**
 * Blog Comment data provider
 */
namespace Borovets\Blog\Model\Comment;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Store\Model\StoreManagerInterface;
use Borovets\Blog\Model\ResourceModel\Comment\CollectionFactory;

/**
 * Class DataProvider
 *
 * @package Borovets\Blog\Model\Comment\DataProvider
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * Comment collection
     *
     * @var \Borovets\Blog\Model\ResourceModel\Comment\Collection
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
     * @param CollectionFactory      $commentCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param StoreManagerInterface  $storeManager
     * @param array                  $meta
     * @param array                  $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $commentCollectionFactory,
        DataPersistorInterface $dataPersistor,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $commentCollectionFactory->create();
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

            foreach ($items as $comment)
                $this->loadedData[$comment->getId()] = $comment->getData();

            $data = $this->dataPersistor->get('borovets_blog_comment');
            if (!empty($data)) {
                $comment = $this->collection->getNewEmptyItem();
                $comment->setData($data);
                $this->loadedData[$comment->getId()] = $comment->getData();
                $this->dataPersistor->clear('borovets_blog_comment');
            }
        }

        return $this->loadedData;
    }
}
