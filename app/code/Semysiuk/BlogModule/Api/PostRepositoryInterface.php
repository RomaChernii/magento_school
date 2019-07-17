<?php

namespace Semysiuk\BlogModule\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Semysiuk\BlogModule\Api\Data\PostInterface;

/**
 * Interface PostRepositoryInterface
 *
 * @package Semysiuk\BlogModule\Api
 */
interface PostRepositoryInterface
{
    /**
     * Retrieve a post by it's id
     *
     * @param $objectId
     *
     * @return \Semysiuk\BlogModule\Api\PostRepositoryInterface
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
     * @param \Semysiuk\BlogModule\Api\Data\PostInterface $object
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
