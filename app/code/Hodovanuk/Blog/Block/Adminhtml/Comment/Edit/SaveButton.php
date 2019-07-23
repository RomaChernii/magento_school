<?php
namespace Hodovanuk\Blog\Block\Adminhtml\Comment\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 * @package Hodovanuk\Blog\Block\Adminhtml\Comment\Edit
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Get save button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Comment'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
