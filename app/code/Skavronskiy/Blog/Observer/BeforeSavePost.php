<?php
/**
 * Before save post observer
 *
 */
namespace Skavronskiy\Blog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class BeforeSavePost
 *
 * @package Skavronskiy\Blog\Observer
 */
class BeforeSavePost implements ObserverInterface
{
    /**
     * Observer execute
     *
     * event: skavronskiy_blog_post_save_before
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $post = $observer->getEvent()->getPost();
        $post->setTitle(__('Title from observer'));
    }
}
