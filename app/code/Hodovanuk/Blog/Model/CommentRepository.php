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
     * @param Data\CommentInterface $comment
     * @return Data\CommentInterface|mixed
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
     * @param $commentId
     * @return Comment|mixed
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
     * @param Data\CommentInterface $comment
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
     * @param $commentId
     * @return bool|mixed
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($commentId)
    {
        return $this->delete($this->getById($commentId));
    }
}
