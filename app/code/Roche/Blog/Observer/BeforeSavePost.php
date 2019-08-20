<?php
/**
 * Before save post observer
 *
 * @category  Roche
 * @package   Roche\Blog
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Roche\Blog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class BeforeSavePost
 *
 * @package Roche\Blog\Observer
 */
class BeforeSavePost implements ObserverInterface
{
    /**
     * Observer execute
     *
     * event: roche_blog_post_save_before
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $post = $observer->getEvent()->getPost();
        $post->setTitle(__('Title from observer'));
    }
}
