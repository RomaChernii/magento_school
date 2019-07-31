<?php

namespace Borovets\Blog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface PostSearchResultsInterface
 *
 * @package Borovets\Blog\Api\Data
 */
interface PostSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get post list
     *
     * @return \Borovets\Blog\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * Set post list
     *
     * @param \Borovets\Blog\Api\Data\PostInterface[] $items
     *
     * @return PostSearchResultsInterface
     */
    public function setItems(array $items);
}
