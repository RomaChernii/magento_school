<?php
/**
 * Blog comment repository
 *
 */
namespace Skavronskiy\Blog\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Skavronskiy\Blog\Api\Data;
use Skavronskiy\Blog\Api\CommentRepositoryInterface;
use Skavronskiy\Blog\Model\ResourceModel\Comment as ResourceComment;
use Skavronskiy\Blog\Model\ResourceModel\Comment\CollectionFactory as CommentCollectionFactory;

/**
 * Class CommentRepository
 *
 * @package Skavronskiy\Blog\Model
 */
class CommentRepository implements CommentRepositoryInterface
{
    /**
     * @var ResourceComment
     */
    private $resource;

    /**
     * @var CommentFactory
     */
    private $commentFactory;

    /**
     * @var CommentCollectionFactory
     */
    private $commentCollectionFactory;

    /**
     * @var Data\CommentSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * CommentRepository constructor.
     * @param ResourceComment $resource
     * @param CommentFactory $commentFactory
     * @param CommentCollectionFactory $commentCollectionFactory
     * @param Data\CommentSearchResultsInterfaceFactory $searchResultsFactory
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
     * Save Comment data
     *
     * @param \Skavronskiy\Blog\Api\Data\CommentInterface $comment
     *
     * @return Comment
     *
     * @throws CouldNotSaveException
     *
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
     * Load Comment data by given Comment Identity
     *
     * @param string $commentId
     *
     * @return Comment
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
     * Load Comment data collection by given search criteria
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     *
     * @return \Skavronskiy\Blog\Model\ResourceModel\Comment\Collection
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     *
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
        $comment = [];
        /** @var Data\CommentInterface $postModel */
        foreach ($collection as $commentModel) {
            $comment[] = $commentModel;
        }
        $searchResults->setItems($comment);

        return $searchResults;
    }

    /**
     * Delete Post
     *
     * @param \Skavronskiy\Blog\Api\Data\CommentInterface $post
     *
     * @return bool
     *
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
     * Delete Comment by given Comment Identity
     *
     * @param string $commentId
     *
     * @return bool
     *
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($commentId)
    {
        return $this->delete($this->getById($commentId));
    }
}
