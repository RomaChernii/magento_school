<?php
/**
 * Skavronskiy Post status
 *
 */
namespace Skavronskiy\Blog\Model\Post\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Skavronskiy\Blog\Model\Post;

/**
 * Class Status
 *
 * @package Skavronskiy\Blog\Model\Post\Source\Status
 */
class Status implements OptionSourceInterface
{
    /**
     * Post
     *
     * @var Post
     */
    private $post;

    /**
     * Status constructor
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->post->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
