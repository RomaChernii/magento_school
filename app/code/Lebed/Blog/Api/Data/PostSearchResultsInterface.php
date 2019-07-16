<?php
/**
 * Lebed Blog post search results interface
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface PostSearchResultsInterface
 *
 * @package Lebed\Blog\Api\Data
 */
interface PostSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get post list
     *
     * @return \Lebed\Blog\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * Set post list
     *
     * @param \Lebed\Blog\Api\Data\PostInterface[] $items
     *
     * @return PostSearchResultsInterface
     */
    public function setItems(array $items);
}
