<?php
/**
 * Lebed Blog BackToCommentButton
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Block\Adminhtml\Comment\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class BackToCommentButton
 *
 * @package Lebed\Blog\Block\Adminhtml\Comment\Edit
 */
class BackToCommentButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Back to Comment'),
            'on_click' =>sprintf("location.href = '%s';", $this->getBackToCommentUrl()),
            'class' => 'back',
            'sort_order' => 10,
        ];
    }

    /**
     * Get url to comment
     *
     * @return string
     */
    public function getBackToCommentUrl()
    {
        return $this->getUrl('*/*/edit', ['id' => $this->getCommentId()]);
    }
}
