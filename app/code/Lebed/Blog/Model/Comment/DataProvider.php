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
    protected  $collection;
    private $loadedData;
    private $dataPersistor;

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
