<?php
namespace Hodovanuk\Blog\Api;

use Hodovanuk\Blog\Model\CommentFactory;
use Hodovanuk\Blog\Model\CommentRepository;
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
     * @param int $objectId
     *
     * @return object CommentRepository
     */
    public function getById($objectId);

    /**
     * Get list
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return object CommentRepository
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * Save
     *
     * @param CommentInterface $object
     *
     * @return bool
     */
    public function save(CommentInterface $object);

    /**
     * Delete by id
     *
     * @param object $objectId
     *
     * @return bool
     */
    public function deleteById($objectId);

    /**
     * Get by post id
     *
     * @param int $postId
     *
     * @return object CommentRepository
     */
    public function getByPostId($postId);
}
