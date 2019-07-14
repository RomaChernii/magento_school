<?php
/**
 * Blog post repository interface
 *
 */
namespace Skavronskiy\Blog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Skavronskiy\Blog\Api\Data\PostInterface;

/**
 * Interface PostRepositoryInterface
 *
 * @package Skavronskiy\Blog\Api
 */
interface PostRepositoryInterface
{
    /**
     * Retrieve a post by it's id
     *
     * @param $objectId
     *
     * @return PostRepositoryInterface
     */
    public function getById($objectId);

    /**
     * Retrieve post which match a specified criteria.
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return \Magento\Framework\Api\SearchResults
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * Save post
     *
     * @param PostInterface $object
     *
     * @return PostRepositoryInterface
     */
    public function save(PostInterface $object);

    /**
     * Delete a post by its id
     *
     * @param int $objectId
     *
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function deleteById($objectId);
}
