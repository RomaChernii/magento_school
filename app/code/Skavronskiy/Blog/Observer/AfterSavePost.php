<?php
/**
 * After save post observer
 *
 */
namespace Skavronskiy\Blog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Backend\App\Action\Context;

/**
 * Class BeforeSavePost
 *
 * @package Skavronskiy\Blog\Observer
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
     * event: skavronskiy_blog_post_save_after
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $id = $observer->getEvent()->getId();
        $this->messageManager->addSuccessMessage(__('You save the post ID - %1 ' , $id));
    }
}
