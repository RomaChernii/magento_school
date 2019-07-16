<?php
/**
 * Blog Comment status
 */

namespace Borovets\Blog\Model\Comment\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Borovets\Blog\Model\Comment;

/**
 * Class Status
 *
 * @package Borovets\Blog\Model\Comment\Source\Status
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
