<?php
/**
 * Blog Post status
 *
 * @category  Roche
 * @package   Roche\Blog
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2018 Smile
 */
namespace Dehtiarov\BlogVideh\Model\Post\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Dehtiarov\BlogVideh\Model\Post;

/**
 * Class Status
 *
 * @package Dehtiarov\BlogVideh\Model\Post\Source\Status
 */
class Status implements OptionSourceInterface
{
    /**
     * Post
     *
     * @var Post
     */
    private $post;

    /**
     * Status constructor
     *
     * @param Post $post
     */
    public function __construct(Post $post)
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
