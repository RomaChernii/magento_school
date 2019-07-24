<?php
/**
 * Blog comment show post button
 */
namespace Borovets\Blog\Block\Adminhtml\Comment\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
/**
 * Class ShowPostButton
 *
 * @package Borovets\Blog\Block\Adminhtml\Comment\Edit
 */
class ShowPostButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Get show post button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Show post'),
            'class' => 'showPost',
            'on_click' => 'window.open( \'' . $this->getShowPostUrl() .
                '\')',            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'showPost']],
                'form-role' => 'showPost',
            ],
            'sort_order' => 80
        ];
    }

    /**
     * Get URL FOR show post button
     *
     * @return string
     */
    public function getShowPostUrl()
    {
        return $this->getUrl('*/*/showPost', ['id' => $this->getCommentId()]);
    }
}
