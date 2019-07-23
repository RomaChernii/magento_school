<?php

namespace Semysiuk\BlogModule\Model\Comment\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Semysiuk\BlogModule\Model\Comment;

/**
 * Class Status
 *
 * @package Semysiuk\BlogModule\Model\Post\Source\Status
 */
class Status implements OptionSourceInterface
{
    /**
     * Comment
     *
     * @var Comment
     */
    private $comment;

    /**
     * Status constructor
     *
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->comment->getAvailableStatuses();
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
