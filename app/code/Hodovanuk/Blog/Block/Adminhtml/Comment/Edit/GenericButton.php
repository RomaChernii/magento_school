<?php
namespace Hodovanuk\Blog\Block\Adminhtml\Comment\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Hodovanuk\Blog\Api\CommentRepositoryInterface;

/**
 * Class GenericButton
 * @package Hodovanuk\Blog\Block\Adminhtml\Comment\Edit
 */
class GenericButton
{
    /**
     * Context
     *
     * @var Context
     */
    private $context;

    /**
     * @var CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * GenericButton constructor.
     * @param Context $context
     * @param CommentRepositoryInterface $comRepository
     */
    public function __construct(
        Context $context,
        CommentRepositoryInterface $comRepository
    ) {
        $this->context = $context;
        $this->commentRepository = $comRepository;
    }


    /**
     * Get comment id
     *
     * @return |null
     */
    public function getCommentId()
    {
        try {
            $modelId = $this->context->getRequest()->getParam('id');

            return $this->commentRepository->getById($modelId)->getId();
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }

    public function getPostId()
    {
        try {
            $modelId = $this->context->getRequest()->getParam('id');

            return $this->commentRepository->getById($modelId)->getPostId();
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array  $params
     *
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
