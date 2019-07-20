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
     * @param $objectId
     * @return mixed
     */
    public function getById($objectId);

    /**
     * @param SearchCriteriaInterface|null $searchCriteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * @param CommentInterface $object
     * @return mixed
     */
    public function save(CommentInterface $object);

    /**
     * @param $objectId
     * @return mixed
     */
    public function deleteById($objectId);

    public function getByPostId($postId);
    
}
