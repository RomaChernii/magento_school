<?php


namespace Myskovets\BlogModule\Model\Post\Source;


use Magento\Framework\Data\OptionSourceInterface;
use Myskovets\BlogModule\Model\Post;

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