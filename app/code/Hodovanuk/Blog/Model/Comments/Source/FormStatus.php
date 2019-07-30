<?php
namespace Hodovanuk\Blog\Model\Comments\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Hodovanuk\Blog\Model\Comment;

/**
 * Class Status
 * @package Hodovanuk\Blog\Model\Comments\Source
 */
class FormStatus implements OptionSourceInterface
{
    /**
     * @var Comment
     */
    private $commentStatus;

    /**
     * Status constructor.
     * @param Comment $comment
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
        unset($availableOptions['3']);
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
