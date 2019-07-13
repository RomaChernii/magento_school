<?php
namespace Hodovanuk\Blog\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Hodovanuk\Blog\Api\Data;
use Hodovanuk\Blog\Api\CommentRepositoryInterface;
use Hodovanuk\Blog\Model\ResourceModel\Comment as ResourceComment;
use Hodovanuk\Blog\Model\ResourceModel\Comment\CollectionFactory as CommentCollectionFactory;

/**
 * Class PostRepository
 * @package Hodovanuk\Blog\Model
 */
class CommentRepository implements CommentRepositoryInterface
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
    private $commentFactory;

    /**
     * Post collection factory
     *
     * @var PostCollectionFactory
     */
    private $commentCollectionFactory;

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
        ResourceComment $resource,
        CommentFactory $commentFactory,
        CommentCollectionFactory $commentCollectionFactory,
        Data\CommentSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resource = $resource;
        $this->commentFactory = $commentFactory;
        $this->commentCollectionFactory = $commentCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param Data\PostInterface $post
     * @return Data\PostInterface|mixed
     * @throws CouldNotSaveException
     */
    public function save(Data\CommentInterface $comment)
    {
        try {
            $this->resource->save($comment);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $comment;
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
    public function getById($commentId)
    {
        $comment = $this->commentFactory->create();
        $this->resource->load($comment, $commentId);
        if (!$comment->getId()) {
            throw new NoSuchEntityException(__('Comment with id "%1" does not exist.', $commentId));
        }

        return $comment;
    }

    /**
     * @param SearchCriteriaInterface|null $criteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $criteria = null)
    {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $collection = $this->commentCollectionFactory->create();
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
     * @param Data\PostInterface $post
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(Data\CommentInterface $comment)
    {
        try {
            $this->resource->delete($comment);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * @param $postId
     * @return bool|mixed
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($commentId)
    {
        return $this->delete($this->getById($commentId));
    }
}
