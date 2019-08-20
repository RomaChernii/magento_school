<?php
/**
 * Lebed Blog InfoViewModel
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\ViewModel\Comment\Item;

use Lebed\Blog\Model\PostRepository;
use Lebed\Blog\Ui\Component\Listing\Column\CommentActions;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\UrlInterface;

/**
 * Class InfoViewModel
 *
 * @package Lebed\Blog\ViewModel\Comment\Item
 */
class InfoViewModel implements ArgumentInterface
{
    /**
     * Registry
     *
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * PostRepository
     *
     * @var PostRepository
     */
    private $postRepository;

    /**
     * Url Builder
     *
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * InfoViewModel constructor.
     *
     * @param Registry       $registry
     * @param PostRepository $postRepository
     */
    public function __construct(
        Registry $registry,
        PostRepository $postRepository,
        UrlInterface $urlBuilder
    ) {
        $this->coreRegistry = $registry;
        $this->postRepository = $postRepository;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Get Comment
     *
     * @return \Lebed\Blog\Model\Comment
     */
    public function getComment()
    {
        return $this->coreRegistry->registry('lebed_blog_comment');
    }

    /**
     * Get Post
     *
     * @param $id
     *
     * @return \Lebed\Blog\Model\Post|null
     */
    public function getPostById($id)
    {
        try {
            $post = $this->postRepository->getById($id);
        } catch (NoSuchEntityException $e) {
            $post = null;
        }

        return $post;
    }

    /**
     * Get Post Url
     *
     * @param string $postId
     *
     * @return string
     */
    public function getPostUrl($postId)
    {
        return $this->urlBuilder->getUrl(
            CommentActions::BLOG_URL_PATH_EDIT,
            ['id' => $postId]
        );
    }
}
