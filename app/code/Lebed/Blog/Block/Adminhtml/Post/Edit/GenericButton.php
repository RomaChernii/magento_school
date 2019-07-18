<?php
/**
 * Lebed Blog post generic button
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Block\Adminhtml\Post\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Lebed\Blog\Api\PostRepositoryInterface;

/**
 * Class GenericButton
 *
 * @package Lebed\Blog\Block\Adminhtml\Post\Edit
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
     * @param Context                 $context
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
