<?php
/**
 * Blog post repository interface
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Koshyk\Blog\Api\Data\PostInterface;

/**
 * Interface PostRepositoryInterface
 *
 * @package Koshyk\Blog\Api
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
