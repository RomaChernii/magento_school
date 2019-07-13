<?php
namespace Hodovanuk\Blog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CommentSearchResultsInterface
 * @package Hodovanuk\Blog\Api\Data
 */
interface CommentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Magento\Framework\Api\ExtensibleDataInterface[]
     */
    public function getItems();

    /**
     * @param array $items
     * @return SearchResultsInterface
     */
    public function setItems(array $items);
}
