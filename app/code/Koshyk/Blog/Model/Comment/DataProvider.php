<?php
/**
 * Blog Comment data provider
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Model\Comment;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Backend\Model\UrlInterface;
use Koshyk\Blog\Model\ResourceModel\Comment\CollectionFactory;

/**
 * Class DataProvider
 *
 * @package Koshyk\Blog\Model\Comment\DataProvider
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * Comment collection
     *
     * @var \Koshyk\Blog\Model\ResourceModel\Comment\Collection
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

            foreach ($items as $comment) {
                $mediaUrl = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
                $url = $mediaUrl . $comment->getImage();
                $image[] = [
                    'url'  => $url,
                    'file' => basename($comment->getImage())
                ];
                $comment->setImage($image);

                $this->loadedData[$comment->getId()] = $comment->getData();
            }

            $data = $this->dataPersistor->get('koshyk_blog_comment');
            if (!empty($data)) {
                $comment = $this->collection->getNewEmptyItem();
                $comment->setData($data);
                $this->loadedData[$comment->getId()] = $comment->getData();
                $this->dataPersistor->clear('koshyk_blog_comment');
            }
        }

        return $this->loadedData;
    }
}
