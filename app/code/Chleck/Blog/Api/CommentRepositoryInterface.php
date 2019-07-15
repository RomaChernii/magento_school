<?php
/**
 * Blog post repository interface
 *
 * @category  Chleck
 * @package   Chleck\Blog
 * @author    Yuri Chleck <yurichlek@gmail.com>
 */
namespace Chleck\Blog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Chleck\Blog\Api\Data\CommentInterface;

/**
 * Interface CommentRepositoryInterface
 *
 * @package Chleck\Blog\Api
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
}
