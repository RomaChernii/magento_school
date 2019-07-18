<?php
namespace Koshyk\Blog\Model\Comment\Source;
use Magento\Framework\Data\OptionSourceInterface;
use Koshyk\Blog\Model\ResourceModel\Post\CollectionFactory;
/**
 * Class Status
 *
 * @package Koshyk\Blog\Model\Comment\Source
 */
class Options implements OptionSourceInterface
{
    /**
     * @var CollectionFactory
     */
    private $_postFactory;
    /**
     * Options constructor.
     *
     * @param CollectionFactory $posts
     */
    public function __construct(CollectionFactory $posts)
    {
        $this->_postFactory = $posts;
    }
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $psFactory = $this->_postFactory->create();
        $dataResult = $psFactory->getData();
        $options = [];
        foreach ($dataResult as $post) {
            $options[] = [
                'label' => $post['title'],
                'value' => $post['id'],
            ];
        }
        return $options;
    }
}
