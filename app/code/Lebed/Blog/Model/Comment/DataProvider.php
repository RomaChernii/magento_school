<?php
/**
 * Lebed Blog Comment DataProvider
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Model\Comment;

use Lebed\Blog\Model\ResourceModel\Comment\Collection;
use Lebed\Blog\Model\ResourceModel\Comment\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;

/**
 * Class DataProvider
 *
 * @package Lebed\Blog\Model\Comment
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * Comment Collection
     *
     * @var Collection
     */
    protected  $collection;

    /**
     * Loaded data
     *
     * @var array
     */
    private $loadedData;

    /**
     * Data persistor interface
     *
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * DataProvider constructor.
     *
     * @param string                 $name
     * @param string                 $primaryFieldName
     * @param string                 $requestFieldName
     * @param CollectionFactory      $commentCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array                  $meta
     * @param array                  $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $commentCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $commentCollectionFactory->create();
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
        if ($this->loadedData === null) {
            $this->loadedData = [];
            $items = $this->collection->getItems();

            foreach ($items as $comment) {
                $this->loadedData[$comment->getId()] = $comment->getData();
            }

            $data = $this->dataPersistor->get('lebed_blog_comment');
            if (!empty($data)) {
                $comment = $this->collection->getNewEmptyItem();
                $comment->setData($data);
                $this->loadedData[$comment->getId()] = $comment->getData();
                $this->dataPersistor->clear('lebed_blog_comment');
            }
        }

        return $this->loadedData;
    }
}
