<?php
/**
 * Before save post observer
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class BeforeSavePost
 *
 * @package Koshyk\Blog\Observer
 */
class BeforeSavePost implements ObserverInterface
{
    /**
     * Observer execute
     *
     * event: koshyk_blog_post_save_before
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $post = $observer->getEvent()->getPost();
        $post->setTitle(__('Title from observer'));
    }
}
