<?php
/**
 * Blog Comment status
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Dehtiarov Victor <videh@smile.fr>
 * @copyright 2018 Smile
 */
namespace Dehtiarov\BlogVideh\Model\Comment\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Dehtiarov\BlogVideh\Model\Comment;

/**
 * Class Status
 *
 * @package Dehtiarov\BlogVideh\Model\Comment\Source\Status
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
