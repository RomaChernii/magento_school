<?php
/**
 * Blog comment generic button
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Dehtiarov Victor <videh@smile.fr>
 * @copyright 2019 Smile
 */
namespace Dehtiarov\BlogVideh\Block\Adminhtml\Comment\Edit;

use Dehtiarov\BlogVideh\Model\ResourceModel\Comment;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Dehtiarov\BlogVideh\Api\CommentRepositoryInterface;

/**
 * Class GenericButton
 *
 * @package Dehtiarov\BlogVideh\Block\Adminhtml\Comment\Edit
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
     * Comment repository interface
     *
     * @var CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * GenericButton constructor
     *
     * @param Context                 $context
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct(
        Context $context,
        CommentRepositoryInterface $commentRepository
    ) {
        $this->context = $context;
        $this->commentRepository = $commentRepository;
    }

    /**
     * Get Comment ID
     *
     * @return int
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
