<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Borovets\Blog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CommentSearchResultsInterface
 *
 * @package Borovets\Blog\Api\Data
 */
interface CommentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get comment list
     *
     * @return \Borovets\Blog\Api\Data\CommentInterface[]
     */
    public function getItems();

    /**
     * Set comment list
     *
     * @param \Borovets\Blog\Api\Data\CommentInterface[] $items
     *
     * @return CommentSearchResultsInterface
     */
    public function setItems(array $items);
}
