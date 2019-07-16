<?php
/**
 * Blog post search results interface
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Dehtiarov Victor <videh@smile.fr>
 * @copyright 2019 Smile
 */
namespace Dehtiarov\BlogVideh\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface PostSearchResultsInterface
 *
 * @package Dehtiarov\BlogVideh\Api\Data
 */
interface PostSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get post list
     *
     * @return \Dehtiarov\BlogVideh\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * Set post list
     *
     * @param \Dehtiarov\BlogVideh\Api\Data\PostInterface[] $items
     *
     * @return PostSearchResultsInterface
     */
    public function setItems(array $items);
}
