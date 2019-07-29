<?php
namespace Hodovanuk\Blog\Api;

use Hodovanuk\Blog\Model\PostRepository;
use Magento\Framework\Api\SearchCriteriaInterface;
use Hodovanuk\Blog\Api\Data\PostInterface;

/**
 * Interface PostRepositoryInterface
 * @package Hodovanuk\Blog\Api
 */
interface PostRepositoryInterface
{
    /**
     * Get by id
     *
     * @param int $objectId
     *
     * @return PostRepository
     */
    public function getById($objectId);

    /**
     * Get list
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return PostRepository
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * Save
     *
     * @param PostInterface $object
     *
     * @return PostRepository
     */
    public function save(PostInterface $object);

    /**
     * Delete by id
     *
     * @param  int $objectId
     *
     * @return PostRepository
     */
    public function deleteById($objectId);
}
