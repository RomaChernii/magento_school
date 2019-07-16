<?php


namespace Myskovets\BlogModule\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CommentSearchResultsInterface extends SearchResultsInterface
{
    public function getItems();

    public function setItems(array $items);
}