<?php
/**
 * Blog post block
 *
 * @category  Roche
 * @package   Roche\Test
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Roche\Blog\Block\Post;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Roche\Blog\Api\PostRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Message\ManagerInterface;

/**
 * Class View
 *
 * @package Roche\Blog\Block\Post
 */
class View extends AbstractPost
{
    /**
     * #@+
     * Config path const
     */
    const POST_IMAGE_HEIGHT = 'roche_blog/post_view/image/height';
    const POST_IMAGE_WIDTH = 'roche_blog/post_view/image/width';
    /**#@-*/

    /**
     * Post repository
     *
     * @var PostRepositoryInterface
     */
    protected $postRepository;

    /**
     * Post
     *
     * @var \Roche\Blog\Api\Data\PostInterface
     */
    protected $post;

    /**
     * Message manager
     *
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * View constructor
     *
     * @param Context                 $context
     * @param PostRepositoryInterface $postRepository
     * @param ScopeConfigInterface    $scopeConfig
     * @param ManagerInterface        $messageManager
     * @param array                   $data
     */
    public function __construct(
        Context $context,
        PostRepositoryInterface $postRepository,
        ScopeConfigInterface $scopeConfig,
        ManagerInterface $messageManager,
        array $data = []
    ) {
        $this->postRepository = $postRepository;
        $this->messageManager = $messageManager;
        parent::__construct(
            $context,
            $scopeConfig,
            $data
        );
    }

    /**
     * Prepare layout
     * Add pager to page and set title
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__($this->getPost()->getTitle()));

        return $this;
    }

    /**
     * Get post
     *
     * @return \Roche\Blog\Api\Data\PostInterface
     */
    public function getPost()
    {
        if ($this->post == null) {
            try {
                $postId = $this->getRequest()->getParam('id');
                if ($postId) {
                    $this->post = $this->postRepository->getById($postId);
                }
            } catch (NoSuchEntityException $error) {
                $this->messageManager->addErrorMessage($error->getMessage());
            }
        }

        return $this->post;
    }
}
