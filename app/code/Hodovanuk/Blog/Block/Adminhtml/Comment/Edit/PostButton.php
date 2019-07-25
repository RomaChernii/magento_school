<?php
namespace Hodovanuk\Blog\Block\Adminhtml\Comment\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 * @package Hodovanuk\Blog\Block\Adminhtml\Comment\Edit
 */
class PostButton extends GenericButton implements ButtonProviderInterface
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
                'label' => __('Post'),
                'on_click' => sprintf(
                    "location.href = '%s';",
                    $this->getUrl('hodovanuk_blog/post/form',['id' => $this->getPostId()])
                ),
                'class' => 'back',
                'sort_order' => 20
            ];
        }
        return $data;
    }

}
