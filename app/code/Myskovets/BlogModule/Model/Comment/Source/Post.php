<?php


namespace Myskovets\BlogModule\Model\Comment\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Myskovets\BlogModule\Model\Comment;

class Post implements OptionSourceInterface
{
    /**
     * @var Comment
     */
    private $comment;

    public function __construct(Comment $cmt) {
        $this->comment = $cmt;
    }


    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [['href' => '/blog/?id=' . $this->comment->getId()]];
    }
}