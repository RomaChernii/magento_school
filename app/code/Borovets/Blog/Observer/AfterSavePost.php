<?php
/**
 * After save post observer
 */
namespace Borovets\Blog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Backend\App\Action\Context;

/**
 * Class AfterSavePost
 *
 * @package Borovets\Blog\Observer
 */
class AfterSavePost implements ObserverInterface
{
    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;

    public function __construct(Context $context)
    {
        $this->messageManager = $context->getMessageManager();
    }

    /**
     * Observer execute
     *
     * event: borovets_blog_post_after_save
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $id = $observer->getEvent()['id'];
        $this->messageManager->addSuccessMessage(__('You save the post with ID ' . $id));
    }
}
