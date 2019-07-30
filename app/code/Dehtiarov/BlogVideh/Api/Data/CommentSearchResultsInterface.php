<?php
/**
 * Blog comment search results interface
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Dehtiarov Victor <videh@smile.fr>
 * @copyright 2019 Smile
 */
namespace Dehtiarov\BlogVideh\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CommentSearchResultsInterface
 *
 * @package Dehtiarov\BlogVideh\Api\Data
 */
interface CommentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get comment list
     *
     * @return \Dehtiarov\BlogVideh\Api\Data\CommentInterface[]
     */
    public function getItems();

    /**
     * Set comment list
     *
     * @param \Dehtiarov\BlogVideh\Api\Data\CommentInterface[] $items
     *
     * @return CommentSearchResultsInterface
     */
    public function setItems(array $items);
}
