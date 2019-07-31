<?php
/**
 * Blog comment delete button
 */
namespace Borovets\Blog\Block\Adminhtml\Comment\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 *
 * @package Borovets\Blog\Block\Adminhtml\Comment\Edit
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->getCommentId()) {
            $data = [
                'label' => __('Delete Comment'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }

        return $data;
    }

    /**
     * Get URL FOR delete button
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['id' => $this->getCommentId()]);
    }
}
