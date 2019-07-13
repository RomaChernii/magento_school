<?php
namespace Hodovanuk\Blog\Model\Comments\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Hodovanuk\Blog\Model\Comment;

/**
 * Class Status
 * @package Hodovanuk\Blog\Model\Post\Source
 */
class Status implements OptionSourceInterface
{
    /**
     * Post
     *
     * @var Post
     */
    private $commentStatus;

    /**
     * Status constructor
     *
     * @param Post $post
     */
    public function __construct(Comment $comment)
    {
        $this->commentStatus = $comment;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->commentStatus->getAnswerStatuses();
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
