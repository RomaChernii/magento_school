<?php

namespace Skavronskiy\Blog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CommentSearchResultsInterface
 *
 * @package Skavronskiy\Blog\Api\Data
 */
interface CommentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get post list
     *
     * @return \Skavronskiy\Blog\Api\Data\CommentInterface[]
     */
    public function getItems();

    /**
     * Set post list
     *
     * @param \Skavronskiy\Blog\Api\Data\CommentInterface[] $items
     *
     * @return CommentSearchResultsInterface
     */
    public function setItems(array $items);
}
