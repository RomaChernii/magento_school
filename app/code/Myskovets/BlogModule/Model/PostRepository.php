<?php


namespace Myskovets\BlogModule\Model;


use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Myskovets\BlogModule\Api\Data\PostInterface;
use Myskovets\BlogModule\Api\Data\PostSearchResultsInterfaceFactory;
use Myskovets\BlogModule\Api\PostRepositoryInterface;
use Myskovets\BlogModule\Model\Post;
use Myskovets\BlogModule\Model\ResourceModel\Post as ResourcePost;
use Myskovets\BlogModule\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;

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
     * @param PostSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ResourcePost $resource,
        PostFactory $postFactory,
        PostCollectionFactory $postCollectionFactory,
        PostSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resource = $resource;
        $this->postFactory = $postFactory;
        $this->postCollectionFactory = $postCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Save Post data
     *
     * @param PostInterface $post
     *
     * @return Post
     *
     * @throws CouldNotSaveException
     */
    public function save(PostInterface $post)
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
     * Load Post data collection by given search criteria
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     *
     * @return \Roche\Blog\Model\ResourceModel\Post\Collection
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
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
     * Delete Post
     *
     * @param \Roche\Blog\Api\Data\PostInterface $post
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
     * Delete Post by given Post Identity
     *
     * @param string $postId
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