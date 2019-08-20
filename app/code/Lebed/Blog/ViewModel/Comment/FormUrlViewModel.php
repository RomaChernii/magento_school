<?php
/**
 * Lebed Blog FormUrlViewModel
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\ViewModel\Comment;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class FormUrlViewModel
 *
 * @package Lebed\Blog\ViewModel\Comment
 */
class FormUrlViewModel implements ArgumentInterface
{
    /**
     * Blog comment action path
     */
    const BLOG_COMMENT_ACTION_PATH = 'lebed_blog/comment/post';

    /**
     * Url Builder
     *
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * Request
     *
     * @var RequestInterface
     */
    private $request;

    /**
     * FormUrlViewModel constructor.
     *
     * @param UrlInterface     $urlBuilder
     * @param RequestInterface $request
     */
    public function __construct(
        UrlInterface $urlBuilder,
        RequestInterface $request
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->request = $request;
    }

    /**
     * Get Action Url
     *
     * @return string
     */
    public function getActionUrl() {
        return $this->urlBuilder->getUrl(
            static::BLOG_COMMENT_ACTION_PATH,
            ['post_id' => $this->request->getParam('id')]
        );
    }
}
