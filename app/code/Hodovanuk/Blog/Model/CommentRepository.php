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
 * Class CommentRepository
 * @package Hodovanuk\Blog\Model
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
     * Save comment
     *
     * @param Data\CommentInterface $comment
     *
     * @return Data\CommentInterface
     *
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
     * Get comment by id
     *
     * @param $commentId
     *
     * @return Comment
     *
     * @throws NoSuchEntityException
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
     * Get list
     *
     * @param SearchCriteriaInterface|null $criteria
     *
     * @return Data\CommentSearchResultsInterface
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
     * Delete comment data object
     *
     * @param Data\CommentInterface $comment
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
     * Get by id
     *
     * @param int $commentId
     *
     * @return bool
     *
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     * @throws NoSuchEntityException
     */
    public function deleteById($commentId)
    {
        return $this->delete($this->getById($commentId));
    }

    /**
     * Get by post_id
     *
     * @param int $postId
     *
     * @return ResourceComment\Collection
     */
    public function getByPostId($postId)
    {
        $returnComments = $this->commentCollectionFactory->create()
            ->addFilter('post_id', $postId);

        return $returnComments;
    }
}
