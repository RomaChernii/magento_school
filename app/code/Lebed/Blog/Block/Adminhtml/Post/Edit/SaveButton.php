<?php
/**
 * Lebed Blog SaveButton
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Block\Adminhtml\Post\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 *
 * @package Lebed\Blog\Block\Adminhtml\Post\Edit
 */
class SaveButton implements ButtonProviderInterface
{
    /**
     * Get save button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Quick Post'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
