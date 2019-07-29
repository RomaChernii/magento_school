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
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Block\ArgumentInterface;

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
     * InfoViewModel constructor.
     *
     * @param Registry       $registry
     * @param PostRepository $postRepository
     */
    public function __construct(
        Registry $registry,
        PostRepository $postRepository
    ) {
        $this->coreRegistry = $registry;
        $this->postRepository = $postRepository;
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
}
