<?php
/**
 * Lebed Blog BeforeSavePost
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class BeforeSavePost
 *
 * @package Lebed\Blog\Observer
 */
class BeforeSavePost implements ObserverInterface
{
    /**
     * Observer execute
     *
     * event: lebed_blog_post_save_before
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $post = $observer->getEvent()->getPost();
        $post->setTitle(__('My title from observer'));
    }
}
