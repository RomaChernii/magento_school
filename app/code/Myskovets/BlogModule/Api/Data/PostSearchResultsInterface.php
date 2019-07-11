<?php
/**
 * Blog post search results interface
 *
 * @category  Roche
 * @package   Roche\Blog
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Myskovets\BlogModule\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface PostSearchResultsInterface
 *
 * @package Roche\Blog\Api\Data
 */
interface PostSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get post list
     *
     * @return \Roche\Blog\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * Set post list
     *
     * @param \Roche\Blog\Api\Data\PostInterface[] $items
     *
     * @return PostSearchResultsInterface
     */
    public function setItems(array $items);
}
