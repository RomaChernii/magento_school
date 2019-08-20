<?php
/**
 * Lebed Blog GoToPostButton
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Block\Adminhtml\Comment\Edit;

use Lebed\Blog\Api\CommentRepositoryInterface;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class GoToPostButton
 *
 * @package Lebed\Blog\Block\Adminhtml\Comment\Edit
 */
class GoToPostButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Blog Post Url path
     */
    const BLOG_URL_PATH_EDIT = 'lebed_blog/post/edit';

    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Go to post'),
            'on_click' => sprintf("window.open('%s', '_blank');", $this->getPostUrl()),
            'class' => 'go-to-post',
            'sort_order' => 20,
            'target' => '_blank',
        ];
    }

    /**
     * Get url to commented post
     *
     * @return string
     */
    public function getPostUrl()
    {
        return $this->getUrl(static::BLOG_URL_PATH_EDIT, ['id' => $this->getPostId()]);
    }
}
