<?php
namespace Hodovanuk\Blog\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Hodovanuk\Blog\Api\Data;
use Hodovanuk\Blog\Api\PostRepositoryInterface;
use Hodovanuk\Blog\Model\ResourceModel\Post as ResourcePost;
use Hodovanuk\Blog\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;

/**
 * Class PostRepository
 * @package Hodovanuk\Blog\Model
 */
class PostRepository implements PostRepositoryInterface
{
    /**
     * Resource post
     *
     * @var ResourcePost
     */
    private $resource;

    /**
     * Post factory
     *
     * @var PostFactory
     */
    private $postFactory;

    /**
     * Post collection factory
     *
     * @var PostCollectionFactory
     */
    private $postCollectionFactory;

    /**
     * Post search results interface factory
     *
     * @var PostSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * PostRepository constructor
     *
     * @param ResourcePost                           $resource
     * @param PostFactory                            $postFactory
     * @param PostCollectionFactory                  $postCollectionFactory
     * @param Data\PostSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ResourcePost $resource,
        PostFactory $postFactory,
        PostCollectionFactory $postCollectionFactory,
        Data\PostSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resource = $resource;
        $this->postFactory = $postFactory;
        $this->postCollectionFactory = $postCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Save data object
     *
     * @param Data\PostInterface $post
     *
     * @return Data\PostInterface
     *
     * @throws CouldNotSaveException
     */
    public function save(Data\PostInterface $post)
    {
        try {
            $this->resource->save($post);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $post;
    }

    /**
     * Load Post data by given Post Identity
     *
     * @param string $postId
     *
     * @return Post
     *
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($postId)
    {
        $post = $this->postFactory->create();
        $this->resource->load($post, $postId);
        if (!$post->getId()) {
            throw new NoSuchEntityException(__('Post with id "%1" does not exist.', $postId));
        }

        return $post;
    }

    /**
     * Get list
     *
     * @param SearchCriteriaInterface|null $criteria
     *
     * @return Data\PostSearchResultsInterfaceFactory
     */
    public function getList(SearchCriteriaInterface $criteria = null)
    {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $collection = $this->postCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        $post = [];
        /** @var Data\PostInterface $postModel */
        foreach ($collection as $postModel) {
            $post[] = $postModel;
        }
        $searchResults->setItems($post);

        return $searchResults;
    }

    /**
     * Delete data array
     *
     * @param Data\PostInterface $post
     *
     * @return bool
     *
     * @throws CouldNotDeleteException
     */
    public function delete(Data\PostInterface $post)
    {
        try {
            $this->resource->delete($post);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * Delete by post id
     *
     * @param int $postId
     *
     * @return bool
     *
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($postId)
    {
        return $this->delete($this->getById($postId));
    }
}
