<?php
/**
 * Blog Comment status
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Model\Comment\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Koshyk\Blog\Model\Comment;

/**
 * Class Status
 *
 * @package Koshyk\Blog\Model\Comment\Source\Status
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
        $availableOptions = $this->comment->getAnswerStatuses();
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
