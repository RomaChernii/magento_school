<?php


namespace Myskovets\BlogModule\Model;


use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Myskovets\BlogModule\Api\CommentRepositoryInterface;
use Myskovets\BlogModule\Api\Data\CommentInterface;
use Myskovets\BlogModule\Api\Data\CommentSearchResultsInterfaceFactory;
use Myskovets\BlogModule\Model\ResourceModel\Comment as ResourceComment;
use Myskovets\BlogModule\Model\ResourceModel\Comment\Collection;
use Myskovets\BlogModule\Model\ResourceModel\Comment\CollectionFactory as CommentCollectionFactory;

class CommentRepository implements CommentRepositoryInterface
{
    /**
     * Resource comment
     *
     * @var ResourceComment
     */
    private $resource;

    /**
     * Comment factory
     *
     * @var CommentFactory
     */
    private $commentFactory;

    /**
     * Comment collection factory
     *
     * @var CommentCollectionFactory
     */
    private $commentCollectionFactory;

    /**
     * Comment search results interface factory
     *
     * @var CommentSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * CommentRepository constructor
     *
     * @param ResourceComment                           $resource
     * @param CommentFactory                            $commentFactory
     * @param CommentCollectionFactory               $commentCollectionFactory
     * @param CommentSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ResourceComment $resource,
        CommentFactory $commentFactory,
        CommentCollectionFactory $commentCollectionFactory,
        CommentSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resource = $resource;
        $this->commentFactory = $commentFactory;
        $this->commentCollectionFactory = $commentCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Save Comment data
     *
     * @param CommentInterface $comment
     *
     * @return Comment
     *
     * @throws CouldNotSaveException
     */
    public function save(CommentInterface $comment)
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
     * Load Comment data collection by given search criteria
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     *
     * @return Collection
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
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
        /** @var Data\CommentInterface $commentModel */
        foreach ($collection as $commentModel) {
            $comment[] = $commentModel;
        }
        $searchResults->setItems($comment);

        return $searchResults;
    }

    /**
     * Delete Comment
     *
     * @param CommentInterface $comment
     *
     * @return bool
     *
     * @throws CouldNotDeleteException
     */
    public function delete(CommentInterface $comment)
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