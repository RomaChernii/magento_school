<?php
/**
 * Lebed Blog Comment Repository Interface
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Api;

use Lebed\Blog\Api\Data\CommentInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface CommentRepositoryInterface
 *
 * @package Lebed\Blog\Api
 */
interface CommentRepositoryInterface
{
    /**
     * Retrieve a comment by it's id
     *
     * @param string $objectId
     *
     * @return CommentRepositoryInterface
     */
    public function getById($objectId);

    /**
     * Retrieve comments which match a specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     *
     * @return \Magento\Framework\Api\SearchResults
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * Save comment
     *
     * @param CommentInterface $object
     *
     * @return CommentRepositoryInterface
     */
    public function save(CommentInterface $object);

    /**
     * Delete a comment by its id
     *
     * @param string $objectId
     *
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function deleteById($objectId);
}
