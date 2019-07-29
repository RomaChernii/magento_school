<?php
namespace Hodovanuk\Blog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Hodovanuk\Blog\Api\Data\CommentInterface;

/**
 * Interface CommentRepositoryInterface
 * @package Hodovanuk\Blog\Api
 */
interface CommentRepositoryInterface
{
    /**
     * Get by id
     *
     * @param $objectId
     *
     * @return mixed
     */
    public function getById($objectId);

    /**
     * Get list
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * Save
     *
     * @param CommentInterface $object
     *
     * @return mixed
     */
    public function save(CommentInterface $object);

    /**
     * Delete by id
     *
     * @param $objectId
     *
     * @return mixed
     */
    public function deleteById($objectId);

    /**
     * Get by post id
     *
     * @param $postId
     *
     * @return mixed
     */
    public function getByPostId($postId);
}
