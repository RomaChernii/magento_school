<?php

namespace Semysiuk\BlogModule\Block\Adminhtml\Post\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Semysiuk\BlogModule\Api\PostRepositoryInterface;

/**
 * Class GenericButton
 *
 * @package Semysiuk\BlogModule\Block\Adminhtml\Post\Edit
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
     * Post repository interface
     *
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * GenericButton constructor
     *
     * @param Context                     $context
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(
        Context $context,
        PostRepositoryInterface $postRepository
    ) {
        $this->context = $context;
        $this->postRepository = $postRepository;
    }

    /**
     * Get Post ID
     *
     * @return int
     */
    public function getPostId()
    {
        try {
            $modelId = $this->context->getRequest()->getParam('id');

            return $this->postRepository->getById($modelId)->getId();
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
