<?php
namespace Hodovanuk\Blog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Hodovanuk\Blog\Api\Data\PostInterface;

/**
 * Interface PostRepositoryInterface
 * @package Hodovanuk\Blog\Api
 */
interface PostRepositoryInterface
{
    /**
     * @param $objectId
     *
     * @return mixed
     */
    public function getById($objectId);

    /**
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * @param PostInterface $object
     *
     * @return mixed
     */
    public function save(PostInterface $object);

    /**
     * @param $objectId
     *
     * @return mixed
     */
    public function deleteById($objectId);
}
