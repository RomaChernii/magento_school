<?php
/**
 * Lebed Blog AnswerButton
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Block\Adminhtml\Comment\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class AnswerButton
 *
 * @package Lebed\Blog\Block\Adminhtml\Comment\Edit
 */
class AnswerButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => 'Answer',
            'on_click' => sprintf("location.href = '%s';", $this->getAnswerUrl()),
            'class' => 'answer',
            'sort_order' => 30,
        ];
    }

    /**
     * Get answer url
     *
     * @return string
     */
    public function getAnswerUrl()
    {
        return $this->getUrl('*/*/answer', ['id' => $this->getCommentId()]);
    }
}
