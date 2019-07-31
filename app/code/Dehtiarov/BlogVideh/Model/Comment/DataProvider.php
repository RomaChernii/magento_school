<?php
/**
 * Blog Comment data provider
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Dehtiarov Viktor <videh@smile.fr>
 * @copyright 2019 Smile
 */

namespace Dehtiarov\BlogVideh\Model\Comment;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Backend\Model\UrlInterface;
use Dehtiarov\BlogVideh\Model\ResourceModel\Comment\CollectionFactory;

/**
 * Class DataProvider
 *
 * @package Dehtiarov\BlogVideh\Model\Comment\DataProvider
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * Comment collection
     *
     * @var \Dehtiarov\BlogVideh\Model\ResourceModel\Comment\Collection
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
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $commentCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param StoreManagerInterface $storeManager
     * @param array $meta
     * @param array $data
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
    )
    {
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
        if ($this->loadedData) {
            return $this->loadedData;
        }

        $data = $this->dataPersistor->get('dehtiarov_blogvideh_comment');
        if (!empty($data)) {
            $comment = $this->collection->getNewEmptyItem();
            $comment->setData($data);
            $this->loadedData[$comment->getId()] = $comment->getData();
            $this->dataPersistor->clear('dehtiarov_blogvideh_comment');
        }

        return $this->loadedData;
    }
}
