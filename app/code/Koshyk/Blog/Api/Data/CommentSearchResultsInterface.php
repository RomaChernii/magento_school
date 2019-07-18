<?php
/**
 * Blog comment search results interface
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CommentSearchResultsInterface
 *
 * @package Koshyk\Blog\Api\Data
 */
interface CommentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get comemnt list
     *
     * @return \Koshyk\Blog\Api\Data\CommentInterface[]
     */
    public function getItems();

    /**
     * Set comment list
     *
     * @param \Koshyk\Blog\Api\Data\CommentInterface[] $items
     *
     * @return CommentSearchResultsInterface
     */
    public function setItems(array $items);
}
