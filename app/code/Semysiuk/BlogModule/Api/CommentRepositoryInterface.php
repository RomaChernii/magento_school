<?php

namespace Semysiu\BlogModule\Api;

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
     * Retrieve a post by it's id
     *
     * @param $objectId
     *
     * @return \Semysiuk\BlogModule\Api\CommentRepositoryInterface
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

