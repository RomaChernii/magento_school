<?php

namespace Semysiuk\BlogModule\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Semysiuk\BlogModule\Api\Data\CommentInterface;

/**
 * Interface CommentRepositoryInterface
 *
 * @package Semysiuk\BlogModule\Api
 */
interface CommentRepositoryInterface
{
    /**
     * Retrieve a comment by it's id
     *
     * @param $objectId
     *
     * @return \Semysiuk\BlogModule\Api\CommentRepositoryInterface
     */
    public function getById($objectId);

    /**
     * Retrieve comment which match a specified criteria.
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return \Magento\Framework\Api\SearchResults
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * Save comment
     *
     * @param \Semysiuk\BlogModule\Api\Data\CommentInterface $object
     *
     * @return CommentRepositoryInterface
     */
    public function save(CommentInterface $object);

    /**
     * Delete a comment by its id
     *
     * @param int $objectId
     *
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function deleteById($objectId);
}

