<?php
/**
 * Blog comment search results interface
 *
 * @category  Chleck
 * @package   Chleck\Blog
 * @author    Yuri Chleck <yurichlek@gmail.com>
 */
namespace Chleck\Blog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface PostSearchResultsInterface
 *
 * @package Chleck\Blog\Api\Data
 */
interface CommentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get post list
     *
     * @return \Chleck\Blog\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * Set post list
     *
     * @param \Chleck\Blog\Api\Data\PostInterface[] $items
     *
     * @return PostSearchResultsInterface
     */
    public function setItems(array $items);
}
