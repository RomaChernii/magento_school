<?php

namespace Semysiuk\BlogModule\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface PostSearchResultsInterface
 *
 * @package Semysiuk\BlogModule\Api\Data
 */
interface CommentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get post list
     *
     * @return \Semysiuk\BlogModule\Api\Data\CommentInterface[]
     */
    public function getItems();

    /**
     * Set comment list
     *
     * @param \Semysiuk\BlogModule\Api\Data\CommentInterface[] $items
     *
     * @return CommentSearchResultsInterface
     */
    public function setItems(array $items);
}
