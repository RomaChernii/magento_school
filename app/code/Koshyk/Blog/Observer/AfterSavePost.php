<?php
/**
 * After save post observer
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Backend\App\Action\Context;

/**
 * Class AfterSavePost
 *
 * @package Koshyk\Blog\Observer
 */
class AfterSavePost implements ObserverInterface
{
    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;

    public function __construct(
        Context $context
    ) {
        $this->messageManager = $context->getMessageManager();
    }

    /**
     * Observer execute
     *
     * event: koshyk_blog_post_save_after
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $this->messageManager->addSuccessMessage(__('All okay'));
    }
}
