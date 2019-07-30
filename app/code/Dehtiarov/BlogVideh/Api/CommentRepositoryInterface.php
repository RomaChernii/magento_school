<?php
/**
 * Blog comment repository interface
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Dehtiarov Victor <videh@smile.fr>
 * @copyright 2019 Smile
 */
namespace Dehtiarov\BlogVideh\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Dehtiarov\BlogVideh\Api\Data\CommentInterface;

/**
 * Interface CommentRepositoryInterface
 *
 * @package Dehtiarov\BlogVideh\Api
 */
interface CommentRepositoryInterface
{
    /**
     * Retrieve a comment by it's id
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
     * @return \Magento\Framework\Api\SearchResults
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * Save post
     *
     * @param CommentInterface $object
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

    /**
     * @param $postId
     *
     * @return mixed
     */
    public function getByPostId($postId);
}
