<?php
/**
 * Blog Comment post ID
 */
namespace Skavronskiy\Blog\Model\Comment\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Skavronskiy\Blog\Model\ResourceModel\Post\CollectionFactory;

/**
 * Class PostId
 *
 * @package Skavronskiy\Blog\Model\Comment\Source\PostId
 */
class PostId implements OptionSourceInterface
{
    /**
     * @var CollectionFactory
     */
    private $_postFactory;

    /**
     * Options constructor
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
        $postFactory = $this->_postFactory->create();
        $posts = $postFactory->getData();
        $options = [];
        foreach ($posts as $post) {
            $options[] = [
                'label' => $post['title'],
                'value' => $post['id'],
            ];
        }

        return $options;
    }
}
