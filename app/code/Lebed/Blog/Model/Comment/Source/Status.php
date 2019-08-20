<?php
/**
 * Lebed Blog Comments Status
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Model\Comment\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Lebed\Blog\Model\Comment;

/**
 * Class Status
 *
 * @package Lebed\Blog\Model\Comment\Source
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
