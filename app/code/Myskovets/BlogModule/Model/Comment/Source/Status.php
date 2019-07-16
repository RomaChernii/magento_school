<?php


namespace Myskovets\BlogModule\Model\Comment\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Myskovets\BlogModule\Model\Comment;

class Status implements OptionSourceInterface
{
    /**
     * Post
     *
     * @var Comment
     */
    private $post;

    /**
     * Status constructor
     *
     * @param Comment $post
     */
    public function __construct(Comment $post)
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