<?php

namespace Myskovets\BlogModule\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Myskovets\BlogModule\Api\Data\PostInterface;

/**
 * Interface PostRepositoryInterface
 *
 * @package Roche\Blog\Api
 */
interface PostRepositoryInterface
{
    /**
     * Retrieve a post by it's id
     *
     * @param $objectId
     *
     * @return \Roche\Blog\Api\PostRepositoryInterface
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
