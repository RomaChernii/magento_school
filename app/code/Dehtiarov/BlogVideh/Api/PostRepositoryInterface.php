<?php
/**
 * Blog post repository interface
 *
 * @category  Roche
 * @package   Roche\Blog
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Dehtiarov\BlogVideh\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Dehtiarov\BlogVideh\Api\Data\PostInterface;

/**
 * Interface PostRepositoryInterface
 *
 * @package Dehtiarov\BlogVideh\Api
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
