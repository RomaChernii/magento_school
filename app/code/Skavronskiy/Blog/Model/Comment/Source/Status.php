<?php
/**
 * Skavronskiy Comment status
 *
 */
namespace Skavronskiy\Blog\Model\Comment\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Skavronskiy\Blog\Model\Comment;

/**
 * Class Status
 *
 * @package Skavronskiy\Blog\Model\Comment\Source
 */
class Status implements OptionSourceInterface
{
    /**
     * @var Comment
     */
    private $comment;

    /**
     * Status constructor.
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
