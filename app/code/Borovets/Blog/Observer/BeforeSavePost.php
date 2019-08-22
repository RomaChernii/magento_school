<?php
/**
 * Before save post observer
 */
namespace Borovets\Blog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class BeforeSavePost
 *
 * @package Borovets\Blog\Observer
 */
class BeforeSavePost implements ObserverInterface
{
    /**
     * Observer execute
     *
     * event: borovets_blog_post_save_success
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $post = $observer->getEvent()->getPost();
        $post->setTitle(__('Title from observer'));
    }
}
