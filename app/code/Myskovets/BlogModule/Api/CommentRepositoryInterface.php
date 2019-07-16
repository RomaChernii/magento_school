<?php


namespace Myskovets\BlogModule\Api;


use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResults;
use Magento\Framework\Exception\NoSuchEntityException;
use Myskovets\BlogModule\Api\Data\CommentInterface;
use Myskovets\BlogModule\Api\Data\PostInterface;

interface CommentRepositoryInterface
{
    /**
     * Retrieve a post by it's id
     *
     * @param $objectId
     *
     * @return CommentRepositoryInterface
     */
    public function getById($objectId);

    /**
     * Retrieve post which match a specified criteria.
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return SearchResults
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * Save post
     *
     * @param PostInterface $object
     *
     * @return CommentRepositoryInterface
     */
    public function save(CommentInterface $object);

    /**
     * Delete a post by its id
     *
     * @param int $objectId
     *
     * @return bool
     * @throws NoSuchEntityException
     */
    public function deleteById($objectId);
}